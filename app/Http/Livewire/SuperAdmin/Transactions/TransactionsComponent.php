<?php

namespace App\Http\Livewire\SuperAdmin\Transactions;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transaction;
use App\Models\TradeAccount;
use Illuminate\Support\Facades\DB;

class TransactionsComponent extends Component
{
        protected $listeners = ['delete-confirmed'=>'deleteTransaction']; // listen to comfirmatio delete and call delete branch function

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $actionId;
    public $paginate;

    public $searchTerm = null;
    public $searchBy = null;

    public function mount(){
        $this->searchBy = 'surname'; //set default search criterial
        $this->paginate = 10; //set default search criterial
    }

    //get branch records
    public function getTransactions(){
        $transactions = Transaction::query()
        ->where('currency', 'like', '%'.$this->searchTerm.'%')
        ->orWhere('purpose', 'like', '%'.$this->searchTerm.'%')
        ->orWhere('tran_type', 'like', '%'.$this->searchTerm.'%')
        ->orWhere('amount', 'like', '%'.$this->searchTerm.'%')
        ->latest()->paginate($this->paginate);
        return $transactions;
    }

    //set branch id when the delete botton is clicked
    public function setActionId($actionId){
         $this->actionId = $actionId;
    }

    //delete branch function to delete branch
    public function deleteTransaction(){
        $transaction= Transaction::find($this->actionId);
        activityLog('Transaction Deleted','a '.$transaction->tran_type. ' of '. $transaction->amount. ' '.$transaction->currency. ' was deleted');


        $account = TradeAccount::first();

        //deuct ballance
        if($transaction->tran_type=="Deposit")
            if($transaction->currency=="Naira"){
                DB::table('trade_accounts')->where('id',$account->id)->decrement('cash_ballance',$transaction->amount);
            }elseif($transaction->currency=="Dollar"){
                DB::table('trade_accounts')->where('id',$account->id)->decrement('wallet_ballance',$transaction->amount);
            }
        elseif($transaction->tran_type=="Withrawal"){
            if($transaction->currency=="Naira"){
                DB::table('trade_accounts')->where('id',$account->id)->increment('cash_ballance',$transaction->amount);
            }elseif($transaction->currency=="Dollar"){
                DB::table('trade_accounts')->where('id',$account->id)->increment('wallet_ballance',$transaction->amount);
            }
        }

        $transaction->delete();
        $this->dispatchBrowserEvent('feedback', ['feedback' => "Transaction Successfully Deleted"]);
    }

    public function render()
    {
        $transactions = $this->getTransactions();
        return view('livewire.super-admin.transactions.transactions-component',compact('transactions'));
    }
}
