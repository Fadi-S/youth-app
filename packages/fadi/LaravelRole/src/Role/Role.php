<?php

namespace Fadi\LaravelRole\Role;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes, RoleRelationships, RoleMethods, HasFactory;

    protected $fillable = ['name'];
    protected $dates = ['deleted_at'];
    protected $with = ['permissions'];
}
