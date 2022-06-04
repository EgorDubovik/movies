<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class,'view'])->name('dashboard');

Route::prefix("auth")->group(function(){
    Route::get("/register",[RegisterController::class,'create']);
    Route::post("/register", [RegisterController::class,"store"]);
    Route::get("/login", [LoginController::class,'view']);
    Route::post("/login", [LoginController::class,'login']);
    Route::get('/logout', [LoginController::class,'destroy']);
});

Route::prefix('order')->group(function (){
    Route::get('/create',[OrderController::class,'create']);
    Route::post('/create',[OrderController::class,'store']);
    Route::get('/{id}',[OrderController::class,'view']);
    Route::delete('/destroy/{order}',[OrderController::class,'destroy']);
    Route::get('/edit/{order}/edit', [OrderController::class, 'edit']);
    Route::put('/{order}', [OrderController::class, 'update']);
});

