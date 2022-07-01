<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\AccEntryType;
class AccEntryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        AccEntryType::create([
            'id' => '1',
            'name' => 'BPV',
            'description' => 'Payment made from Bank account (Bank Payment Voucher)',
            'prefix' => 'BPV-',
        ]);
        AccEntryType::create([
            'id' => '2',
            'name' => 'BRV',
            'description' => 'Received in Bank account (Bank receipt voucher)',
            'prefix' => 'BRV-',
        ]);
        AccEntryType::create([
            'id' => '3',
            'name' => 'CPV',
            'description' => 'Payment made from Cash account (Cash Payment Voucher)',
            'prefix' => 'CPV-',
        ]);
        AccEntryType::create([
            'id' => '4',
            'name' => 'CRV',
            'description' => 'Received in Cash account (Cash receipt voucher)',
            'prefix' => 'CRV-',
        ]);
        AccEntryType::create([
            'id' => '5',
            'name' => 'Journal',
            'description' => 'Transfer between Non Bank account and Cash account',
            'prefix' => 'JV-',
        ]);
        AccEntryType::create([
            'id' => '6',
            'name' => 'Bank Transfers',
            'description' => 'Transfer between Bank account and Cash account',
            'prefix' => 'TP-',
        ]);
    }
}
