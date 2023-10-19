<?php

namespace App\Http\Livewire\SuperAdmin\Accounts;

use Livewire\Component;
use App\Models\TradeAccount;

class ExchangeRateComponent extends Component
{
    public $exchange_rate;

    public function mount(){
        $rate = TradeAccount::first();
        $this->exchange_rate = $rate->exchange_rate;
    }


    public function updateRate(){
        $this->validate(['exchange_rate'=>['required','numeric']]);

        $accounts = TradeAccount::all();

        foreach($accounts as $account){
            $account->update([
                'exchange_rate' => $this->exchange_rate,
            ]);
        }

        $this->dispatchBrowserEvent('feedback',['feedback'=>'Exchange rate successfully update']);
    }
    public function render()
    {
        return view('livewire.super-admin.accounts.exchange-rate-component');
    }
}
