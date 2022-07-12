<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    // If It's not there, mass assigment won't work
    protected $fillable = ['ed_id', 'degree', 'curriculum','place','year_completed'];


    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
