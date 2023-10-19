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

class TraderHistoryComponent extends Component
{
    public $trader;
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

    public function mount($id){
        $this->trader = $id;
    }

    public function allTrades(){
        $trades;
        $trades = TradeHistory::query()
         ->where(function($query)  {
            if($this->startdate!=null && $this->enddate!=null){
                $query->whereBetween('created_at',[$this->startdate." 00:00:00", $this->enddate. " 23:59:59" ]);
            }
         })
         ->where(function($query)  {
                $query->where('user_id',$this->trader);
        })
        ->latest()->paginate($this->paginate);

        $this->setTradeStats($trades);
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

    public function resetFilter(){
        $this->startdate=null;
        $this->enddate=null;
    }

    public function render()
    {
        $trades = $this->allTrades();
        return view('livewire.super-admin.trades.trader-history-component',compact('trades'));
    }
}
