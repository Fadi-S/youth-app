<?php


namespace Fadi\LaravelRole\Traits;

use Fadi\LaravelRole\Role\Role;

trait HasRole
{

    public function hasPermission($permission)
    {
        return $this->hasAnyPermissions($permission);
    }

    public function hasAnyPermissions($permissions)
    {
        $method = is_array($permissions) ? 'whereIn' : 'where';

        return !! $this->role->permissions->$method('name', $permissions)->count();
    }

    public function hasPermissionGroup($group)
    {
        return !! $this->role->permissions->where('group', $group)->count();
    }

    public function permissions()
    {
        return $this->role->permissions;
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
