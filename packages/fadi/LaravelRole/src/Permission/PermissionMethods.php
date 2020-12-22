<?php

namespace Fadi\LaravelRole\Permission;

trait PermissionMethods
{
    public static function groups()
    {
        return \DB::table('permissions')->distinct()->get(['group']);
    }

    public static function permissionsByGroup($group)
    {
        return static::where('group' , $group)->orderBy('id' , 'asc')->get();
    }

    public static function permissionsArray()
    {
        return config('role.default_permissions');
    }
}
