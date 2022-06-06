<?php

namespace App\Http\Controllers;

use App\Http\Requests\DealCustomerUpdateRequest;
use App\Models\Deal;
use Illuminate\Http\Request;

class DealController extends Controller
{

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
}
