<?php

namespace App\Http\Livewire\SuperAdmin\Trades;

use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;
use App\Models\TradeHistory;
use App\Models\TradeAccount;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TradesComponent extends Component
{
    protected $listeners = ['delete-confirmed'=>'deleteTrade']; // listen to comfirmatio delete and call delete branch function

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $actionId;
    public $paginate;
    public $selTrade;
    public $nairaProfit;
    public $dollarProfit;
    public $startdate;
    public $enddate;
    public $user;

    //closing trade variables
    public $clossing_wallet_ballance;
    public $clossing_cash_ballance;
    public $exchange_rate;

    public $searchTerm = null;
    public $searchBy = null;

    public function mount(){
        $this->searchBy = 'surname'; //set default search criterial
        $this->paginate = 10; //set default search criterial
    }

    //get branch records
    public function getTrade(){

             if(Auth::user()->user_type=="Super Admin"){
                $trades = $this->allTrades();
            }else{
                $trades = $this->traderTrades();
            }
        $this->setTradeStats($trades);

        return $trades;
    }

    public function allTrades(){
        $trades;
        $trades = TradeHistory::query()
        ->where(function($query)  {
            if($this->searchTerm!=null) {
                $user = User::where('surname', 'like', '%'.$this->searchTerm.'%')
                ->orWhere('othernames', 'like', '%'.$this->searchTerm.'%')
                ->first();
                $query->where('user_id',$user->id);
            }
         })
         ->where(function($query)  {
            if($this->startdate!=null && $this->enddate!=null){
                $query->whereBetween('created_at',[$this->startdate." 00:00:00", $this->enddate. " 23:59:59" ]);
            }
         })
        ->latest()->paginate($this->paginate);

        return $trades;
    }

    public function traderTrades(){
        $trades;
        $trades = TradeHistory::query()
         ->where(function($query)  {
            if($this->startdate!=null && $this->enddate!=null){
                $query->whereBetween('created_at',[$this->startdate." 00:00:00", $this->enddate. " 23:59:59" ]);
            }
         })
         ->where(function($query)  {
                $query->where('user_id',Auth::user()->id);
         })
        ->latest()->paginate($this->paginate);

        return $trades;
    }

    public function setTradeStats($trades){
        $this->nairaProfit = 0;
        $this->dollarProfit = 0;
        foreach($trades as $trade){
            if($trade->status=="Closed"){
                $this->nairaProfit = $this->nairaProfit + (($trade->closing_wallet_ballance * $trade->closing_exchange_rate) + $trade->closing_cash_ballance)-(($trade->starting_wallet_ballance * $trade->starting_exchange_rate) + $trade->starting_cash_ballance);
                $this->dollarProfit = $this->dollarProfit + ($trade->closing_wallet_ballance + ($trade->closing_cash_ballance/$trade->closing_exchange_rate))-($trade->starting_wallet_ballance + ($trade->starting_cash_ballance/$trade->starting_exchange_rate));
            }
        }
    }

    public function setPagination($paginate){
        $this->paginate = $paginate;
    }

    //set branch id when the delete botton is clicked
    public function setActionId($actionId){
         $this->actionId = $actionId;
    }

    public function getCloseTradeId($id){
        $this->selTrade = TradeHistory::find($id);
    }

    public function closeTrade(){
        $this->validate([
            'clossing_wallet_ballance' => ['required','numeric'],
            'clossing_cash_ballance' => ['required','numeric'],
            'exchange_rate' => ['required','numeric'],
        ]);

        $trade = TradeHistory::find($this->selTrade->id);
        $trade->update([
            'closing_time' => Carbon::now(),
            'closing_wallet_ballance' => $this->clossing_wallet_ballance,
            'closing_cash_ballance' => $this->clossing_cash_ballance,
            'closing_exchange_rate' => $this->exchange_rate,
            'status' => "Closed",
        ]);

        TradeAccount::find($this->selTrade->account_id)->update([
            'wallet_ballance' => $this->clossing_wallet_ballance,
            'cash_ballance' => $this->clossing_cash_ballance,
        ]);

        TradeAccount::query()->update(  [ 'exchange_rate' => $this->exchange_rate,] );


        $this->dispatchBrowserEvent('feedback',['feedback'=>'Trade Successfully Closed']);
    }

    public function deleteTrade(){
        $trade= TradeHistory::find($this->actionId);
        $trade->delete();
        $this->dispatchBrowserEvent('feedback', ['feedback' => "Trade Successfully Deleted"]);
    }

    public function resetFilter(){
        $this->startdate=null;
        $this->enddate=null;
    }

    public function render()
    {
        $trades = $this->getTrade();
        return view('livewire.super-admin.trades.trades-component',compact('trades'));
    }
}
