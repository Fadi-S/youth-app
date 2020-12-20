<?php

namespace Fadi\LaravelRole\Permission;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use PermissionRelationships, PermissionMethods;

    protected $guarded = [];
}
