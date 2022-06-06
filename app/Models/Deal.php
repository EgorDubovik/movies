<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{

    public const ISNEW = 0;
    public const PENDING = 1;
    public const IN_PROGRESS = 2;
    public const DONE = 3;
    public const CLOSE = 4;
    public const CANCEL = 5;

    use HasFactory;

    protected $fillable = [
        'order_id',
        'mover_id',
        'driver_id',
        'driver_phone',
        'driver_fio',
        'customer_phone',
        'customer_fio',
        "status",
    ];

    public function mover(){
        return $this->hasOne(User::class,'id','mover_id');
    }

    public function driver(){
        return $this->hasOne(User::class,'id','driver_id');
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
