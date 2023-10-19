<?php

namespace App\Http\Livewire\SuperAdmin\Accounts;

use Livewire\Component;
use App\Models\TradeAccount;

class CreateAccountComponent extends Component
{
    public $account_name;

    public function updated($fields){
        $this->validateOnly($fields,[
            'account_name' => ['required','string','unique:trade_accounts'],
        ]);
    }

    public function createAccount(){
        $this->validate([
            'account_name' => ['required','string','unique:trade_accounts'],
        ]);

        TradeAccount::create([
            'account_name' => $this->create_account,
            'wallet_ballance' => 0,
            'cash_ballance' => 0,
            'exchange_rate' => 0,
        ]);
    }
    public function render()
    {
        return view('livewire.super-admin.accounts.create-account-component');
    }
}
