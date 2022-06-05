<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class DashboardController extends Controller
{
    public function view(Request $request){

        $orders = Order::all()->load('company')->sortBy('id')->makeHidden(['created_at','updated_at']);
        
        return view('dashboard',['orders'=>$orders]);
    }
}
