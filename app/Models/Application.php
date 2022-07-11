<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    public const PENDING = 0;
    public const CONFIRM = 1;
    public const NOTHIREDE = 2;
    public const STATUS = ['Pending', 'Confirm', 'Not hired'];

    protected $fillable =[
        'order_id',
        'user_id',
        'confirm',
        'comment',
        'created_at',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

}
