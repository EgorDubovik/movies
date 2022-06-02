<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', function () {
    return view('dashboard');
});

Route::prefix("auth")->group(function(){
    Route::get("/register",[RegisterController::class,'create']);
    Route::post("/register", [RegisterController::class,"store"]);
    Route::get("/login", function (){
        return "login";
    });
});

