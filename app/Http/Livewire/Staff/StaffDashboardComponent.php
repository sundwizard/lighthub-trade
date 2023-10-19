<?php

namespace App\Http\Livewire\Staff;

use Livewire\Component;
use App\Models\TradeAccount;
use App\Models\TradeHistory;
use Illuminate\Support\Facades\Auth;
class StaffDashboardComponent extends Component
{
    public function render()
    {
        $account = TradeAccount::all();
        $trade = TradeHistory::where(['user_id'=>Auth::user()->id,'status'=>'Active'])->first();
        $trades = TradeHistory::all();
        return view('livewire.staff.staff-dashboard-component',compact('trade','account','trades'));
    }
}
