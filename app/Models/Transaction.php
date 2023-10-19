<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;
class Transaction extends Model
{
    use HasFactory;
    use UUID;

    protected $fillable = [
        'authorizer_id',
        'amount',
        'purpose',
        'tran_type',
        'currency',
        'account_id',
    ];

    public function user(){
        return $this->belongsTo(User::class,'authorizer_id');
    }

    public function account(){
        return $this->belongsTo(TradeAccount::class);
    }
}
