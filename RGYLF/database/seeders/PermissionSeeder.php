<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::create([
            'id' => '1',
            'name' => 'User Management',
            'tag' => 'user_management',
            'description' => 'User Management',
            'parent_id' => 0,
        ]);
        Permission::create([
            'id' => '2',
            'name' => 'User',
            'tag' => 'user',
            'description' => 'User',
            'parent_id' => 1,
        ]);
        Permission::create([
            'id' => '3',
            'name' => 'Permissions',
            'tag' => 'permission',
            'description' => 'Permissions',
            'parent_id' => 1,
        ]);
        Permission::create([
            'id' => '4',
            'name' => 'Roles',
            'tag' => 'roles',
            'description' => 'Roles',
            'parent_id' => 1,
        ]);
    }
}
