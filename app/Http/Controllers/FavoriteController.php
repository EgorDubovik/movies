<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    function add_to_favorite(User $user){
        $this->authorize('add-to-favorite', $user);
        Favorite::updateOrCreate([
            'company_id'    => $user->id,
            'owner_id'      => Auth::user()->id,
        ]);

        return back();
    }

    function delete(User $user){
        if (!Gate::allows('add-to-favorite', $user)){
            Favorite::where('company_id', $user->id)
                ->where('owner_id', Auth::user()->id)->delete();
        }
        return back();
    }

    function list(){

        $favorites = Favorite::where('owner_id', Auth::user()->id)->get();

        return view('favorite.list', ['favorites' => $favorites]);
    }
}
