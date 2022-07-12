<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoreDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'place',
        'jloc',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'foreign_key');
    }
}
