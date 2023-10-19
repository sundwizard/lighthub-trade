<?php

namespace App\Http\Livewire\SuperAdmin\Transactions;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\TradeAccount;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class WithdrawComponent extends Component
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


    public function withdrawFunds(){
        $this->validate([
            'amount' => ['required','numeric'],
            'currency' => ['required','string'],
            'description' => ['required','string','max:150'],
        ]);

        $account = TradeAccount::find($this->account);

        if($this->currency=="Naira" && $this->amount>$account->cash_ballance){
                $this->dispatchBrowserEvent('errorfeedback', ['errorfeedback' => "Sorry you do not have enough cash ballance to perform this transaction"]);
        }elseif($this->currency=="Dollar" && $this->amount>$account->wallet_ballance){
                $this->dispatchBrowserEvent('errorfeedback', ['errorfeedback' => "Sorry you do not have enough ballance in your wallet to perform this transaction"]);
        }else{

            $deposit = Transaction::create([
                'amount' => $this->amount,
                'currency' => $this->currency,
                'purpose' => $this->description,
                'tran_type' => "Withrawal",
                'authorizer_id' => Auth::user()->id,
                'account_id' =>  $this->account,
            ]);

            if($this->currency=="Naira"){
                DB::table('trade_accounts')->where('id',$account->id)->decrement('cash_ballance',$this->amount);
            }elseif($this->currency=="Dollar"){
                DB::table('trade_accounts')->where('id',$account->id)->decrement('wallet_ballance',$this->amount);
            }

            activityLog('Withdrawal Transaction','a '.$deposit->tran_type. ' of '. $deposit->amount. ' '.$deposit->currency. ' was made by the authorized user');
            $this->reset();
            $this->dispatchBrowserEvent('feedback', ['feedback' => "Funds Withdawal successful"]);
        }


    }

    public function render()
    {
        $accounts = TradeAccount::all();
        return view('livewire.super-admin.transactions.withdraw-component',compact('accounts'));
    }
}
