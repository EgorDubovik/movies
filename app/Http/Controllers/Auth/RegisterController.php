<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function create(Request $request){
        return view("auth.register");
    }

    public function store(RegisterRequest $request){


        $user = User::create([
            'company_name' => $request->company_name,
            'email' => $request->email,
            'password' => password_hash($request->password, PASSWORD_BCRYPT),
            'mc' => $request->mc,
            'dot' => $request->dot,
            'is_mover' => $request->has('mover'),
            'is_driver' => $request->has('driver'),
            ]);

        return view('auth.register-done');
    }
}
