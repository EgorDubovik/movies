<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\ApplicationController;

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
    Route::get('/{id}',[OrderController::class,'view'])->name('order.view');
    Route::delete('/destroy/{order}',[OrderController::class,'destroy']);
    Route::get('/edit/{order}/edit', [OrderController::class, 'edit']);
    Route::put('/{order}', [OrderController::class, 'update']);
    Route::get('/my/orders', [OrderController::class,'my_orders'])->middleware('auth');
    Route::get('/application/send/{order}',[OrderController::class,'submit_application']);
    Route::delete('/application/destroy/{order}',[OrderController::class,'destroy_application']);
    Route::get('/application/confirm/{application}',[OrderController::class,'confirm_application']);

});

Route::prefix('application')->group(function(){
    Route::get('/my/applications',[ApplicationController::class,'index']);
});

Route::prefix('deal')->group(function (){
    Route::get('/{deal}', [DealController::class,'view']);
    Route::post('/{deal}/update/customer',[DealController::class,'update_by_mover']);
    Route::post('/{deal}/update/driver',[DealController::class,'update_by_driver']);
    Route::get('/{deal}/update/status/driver/{status}',[DealController::class,'update_status_driver']);
    Route::get('/{deal}/update/status/mover/{status}',[DealController::class,'update_status_mover']);
    Route::get('/{deal}/close',[DealController::class,'close']);

});

