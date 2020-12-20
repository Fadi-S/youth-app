<?php

namespace Fadi\LaravelRole\Role;

use Fadi\LaravelRole\Permission\Permission;

trait RoleRelationships
{
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role' , 'role_id' , 'permission_id');
    }
}