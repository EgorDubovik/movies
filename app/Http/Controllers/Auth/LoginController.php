<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function view(Request $request){
        return view("auth.login");
    }

    public function login(LoginRequest $request){

        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password], $request->remember)){
            return redirect('/');
        } else {
            return back()->withErrors("User wasn`t found");
        }
    }

    public function destroy(Request $request){
        Auth::logout();
        return redirect("/");
    }

}
