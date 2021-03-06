<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $table = 'favorite';

    protected $fillable = [
        'company_id',
        'owner_id',
    ];

    function company(){
        return $this->belongsTo(User::class, 'company_id',);
    }
}
