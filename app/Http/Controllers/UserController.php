<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('profile.index');
    }

    public function change_password(ChangePasswordRequest $request){

        if (!Hash::check($request->old_password, Auth::user()->password))
            return redirect()->route('profile')->with('error_password',"Old Password Doesn't match!");

        User::find(Auth::user()->id)->update([
           'password'=> Hash::make($request->password),
        ]);

        return redirect()->route('profile')->with('successful_password','Your password has been changed successful');
    }
}
