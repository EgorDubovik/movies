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

        $coordination_from = $this->getcoordination($request->address_from.' '.$request->zip_from);
        $coordination_to = $this->getcoordination($request->address_to.' '.$request->zip_to);
        //dd($coordination_from,$coordination_to);
        Order::create([
           'user_id' => Auth::user()->id,
            'address_from' => $request->address_from,
            'zip_from' => $request->zip_from,
            'lat_from' => $coordination_from[1],
            'long_from' => $coordination_from[2],
            'address_to' => $request->address_to,
            'zip_to' => $request->zip_to,
            'lat_to' => $coordination_to[1],
            'long_to' => $coordination_to[2],
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

        if($request->address_from != $order->address_from){
            $coordination_from = $this->getcoordination($request->address_from.' '.$request->zip_from);
            $request->request->add(['lat_from' => $coordination_from[1]]);
            $request->request->add(['long_from' => $coordination_from[2]]);
        }
        if($request->address_to != $order->address_to){
            $coordination_to = $this->getcoordination($request->address_to.' '.$request->zip_to);
            $request->request->add(['lat_to' => $coordination_to[1]]);
            $request->request->add(['long_to' => $coordination_to[2]]);
        }

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

    }

    private function getcoordination($address){
        $address = str_replace(" ", "+", $address);
        $json = file_get_contents("https://maps.google.com/maps/api/geocode/json?address=$address&key=".ENV('GOOGLE_MAP_API'));
        $json = json_decode($json);
        $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
        $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
        $formatted_address = $json->{'results'}[0]->{'formatted_address'};
        return array($formatted_address, $lat, $long);
    }

    public function search_view(){

        $orders = Order::where('status',Order::IS_NEW)->get();
        $points = [];
        foreach ($orders as $order) {
            $points[] = [
                'id' => $order->id,
                'lat' => $order->lat_from,
                'lng' => $order->long_from,
                'volume' => $order->volume,
                'price' => $order->price,
                'address_from' => $order->address_from,
                'zip_from' => $order->zip_from,
                'address_from' => $order->address_to,
                'address_from' => $order->zip_to,

            ];
        }
        return view('order.search',['points'=>$points]);
    }
}
