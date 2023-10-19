<?php
use App\Models\User;
use App\Models\ActivityLog;
use App\Models\TradeAccount;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



function activityLog($action, $description){
    ActivityLog::create([
        'user_id' => Auth::user()->id,
        'system_ip' =>  \Request::ip(),
        'browser' =>$_SERVER['HTTP_USER_AGENT'],
        'action' => $action,
        'description' => $description,
    ]);
}


function getRate(){
    $rate = TradeAccount::first();
    return $rate->exchange_rate;
}

?>
