<?php

namespace Database\Seeders;

use App\Models\Admin;
use Fadi\LaravelRole\Role\Role;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Administrator',
            'email' => 'admin@alsharobim.com',
            'username' => 'admin',
            'role_id' => Role::first()->id,
            'password' => bcrypt('123456'),
        ]);
    }
}
