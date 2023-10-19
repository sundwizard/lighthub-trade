<?php

namespace App\Http\Livewire\SuperAdmin;

use Livewire\Component;
use App\Models\TradeAccount;
use App\Models\TradeHistory;
use Illuminate\Support\Facades\Auth;

class SuperAdminDashboard extends Component
{
    public function render()
    {
        $account = TradeAccount::all();
        $trade = TradeHistory::where(['user_id'=>Auth::user()->id,'status'=>'Active'])->first();
        return view('livewire.super-admin.super-admin-dashboard',compact('account','trade'));
    }
}
