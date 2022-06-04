<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'address_from',
        'zip_from',
        'address_to',
        'zip_to',
        'description',
        'volume',
        'price',
        'date_send',
        'date_recive',
        ];

    public function company(){
        return $this->belongsTo(User::class,'user_id','id')->select('company_name','id','email');
    }

}
