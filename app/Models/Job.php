<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // for the form to work
    protected $fillable = ['job_id','occupation','location','company','sector'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
