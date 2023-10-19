<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
class TradeAccount extends Model
{
    use HasFactory;
    use UUID;

    protected $fillable = [
        'account_name',
        'wallet_ballance',
        'cash_ballance',
        'exchange_rate'
    ];

}
