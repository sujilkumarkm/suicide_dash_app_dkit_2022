<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'gender',
        'phone',
        'Star',
        'dob',
        'tob',
        'star',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    /**
     * Accessors to append the models array form
     * @var array
     **/
    protected $with = ['profile','other', 'job','education','physical'];

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultProfilePhotoUrl(): string
    {
        $name = trim(collect(explode(' ', $this->name))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));
        $id = Auth::id();
        $data = User::with(array('profile'=>function($query){
            $query->select('id','user_id','gender');
        }))->find($id);
//        dd($data->profile->gender);
        if($data->profile->gender == 'Male')
        {
            return '/assets/img/male.png';
        }
        else
        {
            return '/assets/img/female.png';
        }
    }

    public function other(): HasOne
    {
        return $this->hasOne(Other::class,'user_id');
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class,'user_id');
    }
    public function job(): HasOne
    {
        return $this->hasOne(Job::class,'job_id');
    }
    public function education(): HasOne
    {
        return $this->hasOne(Education::class,'ed_id');
    }
    public function physical(): HasOne
    {
        return $this->hasOne(Physical::class,'ph_id');
    }


}
