<?php

namespace Fadi\LaravelRole\Role;

use Fadi\LaravelRole\Permission\Permission;

trait RoleMethods
{
    public static function createDefault()
    {
        $admin = static::create(['name'=>'Admin']);
        $permissions = Permission::permissionsArray();
        foreach($permissions as $perm)
        {
            $perm = Permission::create(
                [
                    'group' => $perm['group'],
                    'name'  => $perm['name'],
                    'label' => $perm['label']
                ]);
            $admin->permissions()->attach($perm->id);
        }
    }

    public function givePermissionTo($permission)
    {
        $method = "save";

        if(is_string($permission)) {
            $permission = Permission::where("name", $permission)->firstOrFail();

        }elseif (is_array($permission)) {
            $permission = Permission::whereIn("name", $permission)->get();

            $method = "saveMany";
        }

        $this->permissions()->$method($permission);
    }
}
