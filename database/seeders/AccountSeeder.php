<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TradeAccount;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TradeAccount::create([
            'account_name' => 'Account A',
            'wallet_ballance' => 0,
            'cash_ballance' => 0,
            'exchange_rate' => 770,
        ]);

        TradeAccount::create([
            'account_name' => 'Account B',
            'wallet_ballance' => 0,
            'cash_ballance' => 0,
            'exchange_rate' => 770,
        ]);

        TradeAccount::create([
            'account_name' => 'Account C',
            'wallet_ballance' => 0,
            'cash_ballance' => 0,
            'exchange_rate' => 770,
        ]);
    }
}
