<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(AccCostCenterSeeder::class);
        $this->call(AccEntryTypeSeeder::class);
        $this->call(AccGroupSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PermissionSeeder::class);
        
    }
}
