<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class SendStaffMail extends Model
{
    use HasFactory;
    use UUID;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'subject',
        'mail_body'
    ];

    public function sender(){
        return $this->belongsTo(User::class,'sender_id');
    }

    public function receiver(){
        return $this->belongsTo(User::class,'sender_id');
    }
}
