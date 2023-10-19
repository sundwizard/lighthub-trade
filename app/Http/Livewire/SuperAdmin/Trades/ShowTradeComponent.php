<?php

namespace App\Http\Livewire\SuperAdmin\Trades;

use Livewire\Component;
use App\Models\TradeHistory;

class ShowTradeComponent extends Component
{
    public $trade_id;

    public function mount($id){
        $this->trade_id = $id;
    }

    public function render()
    {
        $trade = TradeHistory::find($this->trade_id);
        $nairaProfit = (($trade->closing_wallet_ballance * $trade->closing_exchange_rate) + $trade->closing_cash_ballance)-(($trade->starting_wallet_ballance * $trade->starting_exchange_rate) + $trade->starting_cash_ballance);
        $closeExchange = $trade->closing_exchange_rate==null?1:$trade->closing_exchange_rate;
        $dollarProfit = $nairaProfit / $closeExchange;
        return view('livewire.super-admin.trades.show-trade-component',compact('trade','nairaProfit','dollarProfit'));
    }
}
