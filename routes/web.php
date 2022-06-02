<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('dashboard');
});

Route::get("auth/register",function (){
    return view("auth.register");
});
