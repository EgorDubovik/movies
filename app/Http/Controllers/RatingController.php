<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function create(Request $request, User $receiver){

        $this->authorize('send-rating', $receiver->id);

        $validate = $request->validate([
           'company_rating' => 'required',
        ]);

        Rating::create([
            'sender_id' => Auth::user()->id,
            'receiver_id' => $receiver->id,
            'star' => $request->company_rating,
            'comment' => $request->comment,
        ]);

        return back()->with('successful','Review hav been send successful');

    }
}
