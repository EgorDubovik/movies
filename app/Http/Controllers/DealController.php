<?php

namespace App\Http\Controllers;

use App\Http\Requests\DealCustomerUpdateRequest;
use App\Models\Application;
use App\Models\Deal;
use App\Models\Order;
use App\Notifications\ChangeDealStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class DealController extends Controller
{

    public function index(){

        $deals = Deal::where('driver_id',Auth::user()->id)->orWhere('mover_id',Auth::user()->id)->orderByDesc('id')->get();
        return view('deal.index', ['deals'=>$deals]);
    }

    public function view(Deal $deal){
        $this->authorize('view-deal',$deal);
        return view('deal.view',['deal'=>$deal]);
    }

    public function create(Request $request){

    }

    public function update_by_mover(Request $request, Deal $deal){
        $this->authorize('update-deal-customer',$deal);

        $deal->update([
           'customer_phone'=> $request->customer_phone,
           'customer_fio' => $request->customer_fio,
        ]);

        return back()->with('successful','Customer information has been update');

    }
    public function update_by_driver(Request $request, Deal $deal){
        $this->authorize('update-deal-driver',$deal);

        $deal->update([
            'driver_phone'=> $request->driver_phone,
            'driver_fio' => $request->driver_fio,
        ]);

        return back()->with('successful','Customer information has been update');
    }

    public function update_status_driver(Deal $deal, $status){
        $this->authorize('change-deal-status-driver',$deal);
        if(in_array($status,array(Deal::IN_PROGRESS, Deal::DELIVERED, Deal::CANCEL))){
            $deal->update([
                'status'=> $status
            ]);
            Notification::send($deal->mover, new ChangeDealStatus($deal->id, Auth::user()->id, $status));
            return back();
        } else {
            abort(403);
        }

    }

    public function update_status_mover(Deal $deal, $status){
        $this->authorize('change-deal-status-mover',$deal);
        if(in_array($status,array(Deal::DONE))){
            $deal->update([
                'status'=> $status
            ]);
            $deal->order->update([
                'status' => Order::IS_DONE
            ]);

            return back();
        } else {
            abort(403);
        }
    }

    public function close(Deal $deal){

        $this->authorize('close-deal', $deal);

        $order = $deal->order;

        // Change order status for new
        $order->update([
           'status' => Order::IS_NEW
        ]);

        // Remove application with this driver_id
        Application::find($order->confirmed_application->id)->delete();

        // Remove deal
        $deal->delete();

        return redirect()->route('order.view',['id'=>$order->id]);
    }
}
