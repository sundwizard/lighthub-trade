<?php

namespace App\Http\Livewire\SuperAdmin\Transactions;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\TradeAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DepositComponent extends Component
{
    public $amount;
    public $description;
    public $currency;
    public $account;


    public function updated($fields){
        $this->validateOnly($fields,[
            'amount' => ['required','numeric'],
            'currency' => ['required','string'],
            'description' => ['required','string','max:150'],
        ]);
    }

    public function depositFunds(){
        $this->validate([
            'amount' => ['required','numeric'],
            'currency' => ['required','string'],
            'description' => ['required','string','max:150'],
        ]);

        $transaction = Transaction::create([
            'amount' => $this->amount,
            'currency' => $this->currency,
            'purpose' => $this->description,
            'tran_type' => "Deposit",
            'authorizer_id' => Auth::user()->id,
            'account_id' =>  $this->account,
        ]);

        $account = TradeAccount::find($this->account);

        if($this->currency=="Naira"){
            DB::table('trade_accounts')->where('id',$account->id)->increment('cash_ballance',$this->amount);
        }elseif($this->currency=="Dollar"){
            DB::table('trade_accounts')->where('id',$account->id)->increment('wallet_ballance',$this->amount);
        }

        activityLog('Deposit Transaction','a '.$transaction->tran_type. ' of '. $transaction->amount. ' '.$transaction->currency. ' was made by the authorized user');
        $this->reset();
        $this->dispatchBrowserEvent('feedback', ['feedback' => "Funds Deposit successfyl"]);

    }
    public function render()
    {
        $accounts = TradeAccount::all();
        return view('livewire.super-admin.transactions.deposit-component',compact('accounts'));
    }
}
