<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected  $fillable = ['name', 'description'];


    // relacionamento de  funçao - usuario
    public function users()
    {
        return $this->belongsToMany(Role::class, 'role_users');
    }

    // relacionamento permissao - role
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permissions_roles');
    }
}
