<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Deal;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $this->authorize('view-applications');
        $applications = Application::where('user_id',Auth::user()->id)->orderByDesc('id')->get();
        return view('order.applications.my-applications',['applications' => $applications]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request,Order $order)
    {
        $this->authorize('send-application',$order);

        Application::create([
            'order_id' => $order->id,
            'user_id' => Auth::user()->id
        ]);
        return redirect()->route('order.view',['id'=>$order->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,Application $application)
    {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Order $order)
    {
        $application = Application::where(['user_id'=>Auth::user()->id,'order_id'=>$order->id,'confirm'=>0])->first();
        if($application){
            $application->delete();
            return back();
        } else {
            abort(403);
        }
    }
}
