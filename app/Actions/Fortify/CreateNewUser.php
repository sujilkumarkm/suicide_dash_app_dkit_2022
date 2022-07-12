<?php

namespace App\Actions\Fortify;

use App\Models\Education;
use App\Models\Job;
use App\Models\Other;
use App\Models\Physical;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Str;

class CreateNewUser implements CreatesNewUsers
{
    use HasFactory;
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return User
     * @throws ValidationException
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:50', 'unique:users'],
            'password' => $this->passwordRules(),
            'gender' => ['required'],
            'star' => ['required'],
            'dob' => ['required', 'date'],
            'cast' => ['required'],
            'formem' => ['required'],
            'jathakam' => ['required'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'password' => Hash::make($input['password']),
        ]);

        // create profile model
        $profile = Profile::create([
            'user_id' => $user->id,
            'slug' => Str::of($user->name)->slug('-'),
            'gender' => $input['gender'],
            'dob' => $input['dob'],
            'tob' => $input['tob'],
            'star' => $input['star'],
        ]);
        // create other model
        $other = Other::create([
            'user_id' => $user->id,
            'cast' => $input['cast'],
            'aboutme' => $input['aboutme'],
            'formem' => $input['formem'],
            'jathakam' => $input['jathakam'],
            'status' => $input['status'],
        ]);
        $job = Job::create([
            'job_id' => $user->id,
        ]);
        $education = Education::create([
            'ed_id' => $user->id,
        ]);
        $physical = Physical::create([
            'ph_id' => $user->id,
        ]);


        return $user;
    }
}
