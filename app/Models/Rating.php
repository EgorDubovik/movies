<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\TextUI\ReflectionException;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'rating';
    protected $fillable = [
      'sender_id',
      'receiver_id',
      'star',
      'comment',
    ];


    function sender(){
        return $this->belongsTo(User::class,'sender_id');
    }
}
