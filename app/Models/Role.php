<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
    ];

    public function permissions() {

        return $this->belongsToMany(Permission::class,'roles_permissions');
            
    }
     
    public function admins() {
     
        return $this->belongsToMany(Admin::class,'admins_roles');
            
    }

    public static function generateSlug($value)
    {
        return Str::slug($value);
    }
}
