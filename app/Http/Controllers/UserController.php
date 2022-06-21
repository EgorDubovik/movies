<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ProfileUpdateRequest;
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

    public function update(ProfileUpdateRequest $request){
        Auth::user()->update([
           'company_name' => $request->company_name,
            'email' => $request->email,
            'is_mover' => $request->has('mover'),
            'is_driver' => $request->has('driver'),
            'website' => $request->website,
            'phone' => $request->phone,
        ]);

        return redirect()->route('profile')->with('successful_edit','Your information has been changed successful');
    }

    public function list(){
        $users = User::where('id','<>', Auth::user()->id)->get();
        return view('profile.list',['users'=>$users]);
    }

    public function view(User $user){
        $orders = $user->orders;
        return view('profile.view',['user' => $user, 'orders' => $orders]);
    }
}
