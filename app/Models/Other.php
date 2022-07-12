<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Other extends Model
{
    use HasFactory;
    // If It's not there, mass assigment won't work
    protected $fillable = ['jathakam','user_id','cast', 'famstat', 'hobbie', 'aboutme', 'demands', 'formem', 'prf_stat','status'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
