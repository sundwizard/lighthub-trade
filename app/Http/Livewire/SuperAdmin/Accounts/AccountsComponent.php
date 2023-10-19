<?php

namespace App\Http\Livewire\SuperAdmin\Accounts;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TradeAccount;
use Illuminate\Support\Facades\DB;

class AccountsComponent extends Component
{
    protected $listeners = ['delete-confirmed'=>'deleteAccount']; // listen to comfirmatio delete and call delete branch function

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $actionId;
    public $paginate;
    public $account_bal;

    public $searchTerm = null;
    public $searchBy = null;

    public function mount(){
        $this->paginate = 10; //set default search criterial
    }

    //get branch records
    public function getAccounts(){
        $accounts = TradeAccount::query()
        ->where('account_name', 'like', '%'.$this->searchTerm.'%')
        ->latest()->paginate($this->paginate);
        return $accounts;
    }

    //set branch id when the delete botton is clicked
    public function setActionId($actionId){
         $this->actionId = $actionId;
    }

    public function deleteAccount(){
        TradeAccount::find($this->actionId)->delete();
        $this->dispatchBrowserEvent('feedback',['feedback'=>'Account Successfully Deleted']);
    }

    public function render()
    {
        $accounts = $this->getAccounts();
        return view('livewire.super-admin.accounts.accounts-component',compact('accounts'));
    }
}
