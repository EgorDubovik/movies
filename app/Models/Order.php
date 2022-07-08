<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public const IS_NEW = 0;
    public const IS_PENDING = 1;
    public const IS_DONE = 2;
    public const STATUS = ['New', 'Pending', 'Done'];

    protected $fillable =[
        'user_id',
        'address_from_id',
        'address_to_id',
        'description',
        'volume',
        'price',
        'date_send',
        'date_recive',
        'status',
        ];

    public function company(){
        return $this->belongsTo(User::class,'user_id','id')->select('company_name','id','email');
    }

    public function applications(){
        return $this->hasMany(Application::class);
    }

    public function confirmed_application(){
        return $this->hasOne(Application::class)->where('confirm',1);
    }

    public function deal(){
        return $this->hasOne(Deal::class,'order_id');
    }


}
