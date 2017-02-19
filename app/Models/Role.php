<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = [
        'name', 'level', 'description'
    ];

    public function users() {
        return $this->hasMany(User::class, 'role_id');
    }


    public function permissions() {
        return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id', 'permission_id');
    }
}
