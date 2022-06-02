<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function create(Request $request){
        return view("auth.register");
    }

    public function store(RegisterRequest $request){

        $validate = $request->validate();
        return "true";
    }
}
