<?php

namespace App\Http\Livewire\SuperAdmin\Trades;

use Livewire\Component;
use App\Models\Trade;
use App\Models\TradeHistory;
use App\Models\TradeAccount;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class CreateTradeComponent extends Component
{
    protected $listeners = ['start-confirmed'=>'startTrade'];

    public $selAccount;
    public $sel_account_bal;
    public $exchange_rate;

    public function render()
    {
        $accounts = TradeAccount::all();
        $trade = TradeHistory::where(['status'=>'Pending'])->first();
        return view('livewire.super-admin.trades.create-trade-component',compact('accounts','trade'));
    }


    public function UpdatedSelaccount($id){
        $this->sel_account_bal =TradeAccount::find($id);
    }

    public function startTrade(){

        $trade = TradeHistory::where(['status'=>'Active'])->where('account_id',$this->selAccount)->first();
        
        $account = TradeAccount::find($this->selAccount);

        $this->validate([
            'exchange_rate' => ['required','numeric']
        ]);

        if($trade!=null){
            if($trade->account_id==$this->selAccount){
                $this->dispatchBrowserEvent('errorfeedback',['errorfeedback'=>'Sorry the selected account is already been trade with']);
            }else{
                $this->validateTrade($account,$trade);
            }
        }else{
            $this->validateTrade($account,$trade);
        }
    }
    
    public function validateTrade($account, $trade){
        if($account->cash_ballance<$account->exchange_rate && ($account->wallet_ballance*$account->exchange_rate)<$account->exchange_rate){
            $this->dispatchBrowserEvent('errorfeedback',['errorfeedback'=>'Sorry the selected account do not have enough funds to trade with']);
        }elseif($trade!=null){
            if($trade->user_id==Auth::user()->id){
                $this->dispatchBrowserEvent('errorfeedback',['errorfeedback'=>'Sorry you already have an active trade, you cant  trade more than one account at a time']);
            }else{
                $this->beginTrade($account, $trade);
            }
        }else{
            $this->beginTrade($account, $trade);
        }
    }
    
    public function beginTrade($account, $trade){
         $trade = TradeHistory::create([
                'user_id' => Auth::user()->id,
                'account_id' => $this->selAccount,
                'starting_time' => Carbon::now(),
                'starting_wallet_ballance' => $account->wallet_ballance,
                'starting_cash_ballance' => $account->cash_ballance,
                'starting_exchange_rate' => $this->exchange_rate,
            ]);
            $this->dispatchBrowserEvent('feedback',['feedback'=>'Trade Successfully started']);
    }
}
