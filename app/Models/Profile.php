<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Profile extends Model
{
    use HasFactory;

    // If It's not there, mass assigment won't work
    protected $fillable = ['user_id', 'slug', 'gender','dob', 'tob','star'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
