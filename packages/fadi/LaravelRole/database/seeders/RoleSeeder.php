<?php

namespace Fadi\LaravelRole\Database\Seeders;

use Fadi\LaravelRole\Role\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::createDefault();
    }
}
