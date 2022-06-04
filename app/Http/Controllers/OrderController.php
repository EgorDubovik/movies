<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Order::class,'order');
    }

    public function create(){

        return view('order.order-create');
    }

    public function store(OrderRequest $request){

        Order::create([
           'user_id' => Auth::user()->id,
            'address_from' => $request->address_from,
            'zip_from' => $request->zip_from,
            'address_to' => $request->address_to,
            'zip_to' => $request->zip_to,
            'description' => $request->description,
            'volume' => $request->volume,
            'price' => $request->price,
            'date_send' => $request->date_send,
            'date_recive'=> $request->date_receive,
        ]);

        return redirect()->back()->with('successful', 'Your order created successful');
    }

    public function view(Request $request){

        $order = Order::find($request->id);
        return view('order.view-details')->with('order',$order);
    }

    public function destroy(Order $order){

        $order->delete();
        return back();
    }
}
