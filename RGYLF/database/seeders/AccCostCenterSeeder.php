<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\AccCostCenter;
class AccCostCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        AccCostCenter::create([
            'id' => '1',
            'name' => 'General',
            'remarks' => 'General No any specified cost center.',
            'active' => 1,
        ]);
    }
}
