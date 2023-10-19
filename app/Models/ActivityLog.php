<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class ActivityLog extends Model
{
    use HasFactory;
    use UUID;

    protected $fillable = [
        'user_id',
        'browser',
        'action',
        'description',
        'system_ip',
    ];

    public function user(){
        return $this->belongsTo(user::class);
    }
}
