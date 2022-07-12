<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Physical extends Model
{
    use HasFactory;

    // If It's not there, mass assigment won't work
    protected $fillable = ['ph_id', 'height', 'weight', 'btype','complexion', 'blood_group'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
