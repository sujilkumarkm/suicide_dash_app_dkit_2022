<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Permission extends Model
{
    use HasFactory;

    public function roles() {
        return $this->belongsToMany(Role::class,'roles_permissions');
    }
     
    public function admins() {
        return $this->belongsToMany(Admin::class,'admins_permissions');        
    }

    public static function generateSlug($value)
    {
        return Str::slug($value);
    }
}