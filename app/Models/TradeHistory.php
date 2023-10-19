<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class TradeHistory extends Model
{
    use HasFactory;
    use UUID;

    protected $fillable = [
        'user_id',
        'starting_wallet_ballance',
        'starting_cash_ballance',
        'starting_exchange_rate',
        'closing_wallet_ballance',
        'closing_cash_ballance',
        'closing_exchange_rate',
        'starting_time',
        'closing_time',
        'profit',
        'status',
        'account_id',
    ];

    protected $casts = [
        'starting_time' => 'datetime',
        'closing_time' => 'datetime',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function account(){
        return $this->belongsTo(TradeAccount::class);
    }
}
