<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{

    public const ISNEW = 0;
    public const IN_PROGRESS = 1;
    public const DELIVERED = 2;
    public const DONE = 3;
    public const CANCEL = 4;
    public const STATUS = ['New','In progress','Delivered','Done','Canceled'];
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
