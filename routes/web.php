<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard');
});

Route::prefix("auth")->group(function(){
    Route::get("register",function (){
        return view("auth.register");
    });
    Route::get("login", function (){
        return "login";
    });
});

