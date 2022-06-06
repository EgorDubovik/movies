<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Application;
use App\Models\Deal;
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
            'date_receive'=> $request->date_receive,
        ]);

        return redirect()->back()->with('successful', 'Your order created successful');
    }

    public function view(Request $request){

        $order = Order::find($request->id);
        return view('order.view-details')->with('order',$order);
    }

    public function destroy(Order $order){
        $order->delete();
        return redirect('/');
    }

    public function edit(Order $order){
        return view('order.order-edit')->with('order',$order);
    }

    public function update(OrderRequest $request,Order $order){

        $order->update($request->all());
        return redirect('/order/'.$order->id)->with('successful', 'You order has been update successful');
    }

    public function my_orders(){
        $orders = Order::where('user_id',Auth::user()->id)->get()->load('company');
        return view('order.my-orders')->with('orders',$orders);
    }

    public function submit_application(Request $request, Order $order){

        $this->authorize('send-application',$order);

        Application::create([
            'order_id' => $order->id,
            'user_id' => Auth::user()->id
        ]);
        return redirect()->route('order.view',['id'=>$order->id]);
    }

    public function destroy_application(Request $request, Order $order){
        $application = Application::where(['user_id'=>Auth::user()->id,'order_id'=>$order->id,'confirm'=>0])->first();
        if($application){
            $application->delete();
            return back();
        } else {
            abort(403);
        }
    }

    public function confirm_application(Application $application){
        $this->authorize('confirm-application',$application);
        $application->update([
            'confirm'=>1
        ]);
        Deal::create([
            'order_id'=>$application->order_id,
            'mover_id'=>Auth::user()->id,
            'driver_id'=>$application->user_id,
        ]);

        $application->order->update([
           'status'=>Order::IS_PENDING
        ]);

        return back();
    }
}
