<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return view('dashboard');
});

Route::prefix("auth")->group(function(){
    Route::get("register",function (){
        return view("auth.register");
    });
    Route::post("register", [RegisterController::class,"create"]);
    Route::get("login", function (){
        return "login";
    });
});

