<?php

namespace App\Http\Controllers;

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
}
