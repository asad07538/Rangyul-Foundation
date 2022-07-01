<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AccGroup;
class AccGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        AccGroup::create([
            'id' => '1',
            'name' => 'Assets',
            'group_code' => '',
            // 'parent_id' => 0,
            // 'fy_id' => 0,
        ]);
        AccGroup::create([
            'id' => '2',
            'name' => 'Fund and Liabilities',
            'group_code' => '',
            // 'parent_id' => 0,
            // 'fy_id' => 0,
        ]);
        AccGroup::create([
            'id' => '3',
            'name' => 'Incomes',
            'group_code' => '',
            // 'parent_id' => 0,
            // 'fy_id' => 0,
        ]);
        AccGroup::create([
            'id' => '4',
            'name' => 'Expenses',
            'group_code' => '',
            // 'parent_id' => 0,
            // 'fy_id' => 0,
        ]);
        AccGroup::create([
            'id' => '5',
            'name' => 'Donar',
            'group_code' => '',
            'parent_id' => 1,
            // 'fy_id' => 0,
        ]);
        AccGroup::create([
            'id' => '6',
            'name' => 'Beneficiaries',
            'group_code' => '',
            'parent_id' => 1,
            // 'fy_id' => 0,
        ]);
    }
}
