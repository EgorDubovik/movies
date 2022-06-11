<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\UserController;

Route::get('/', [DashboardController::class,'view'])->name('dashboard');

Route::prefix("auth")->group(function(){
    Route::get("/register",[RegisterController::class,'create']);
    Route::post("/register", [RegisterController::class,"store"]);
    Route::get("/login", [LoginController::class,'view']);
    Route::post("/login", [LoginController::class,'login']);
    Route::get('/logout', [LoginController::class,'destroy']);
});
// Orders
Route::prefix('order')->group(function (){
    Route::get('/create',[OrderController::class,'create']);
    Route::post('/create',[OrderController::class,'store']);
    Route::get('/{id}',[OrderController::class,'view'])->name('order.view');
    Route::delete('/destroy/{order}',[OrderController::class,'destroy']);
    Route::get('/edit/{order}/edit', [OrderController::class, 'edit']);
    Route::put('/{order}', [OrderController::class, 'update']);
    Route::get('/my/orders', [OrderController::class,'my_orders'])->middleware('auth');

});
// Applications
Route::prefix('application')->group(function(){
    Route::get('/my/applications',[ApplicationController::class,'index'])->middleware('auth');
    Route::get('/confirm/{application}',[ApplicationController::class,'update']);
    Route::get('/send/{order}',[ApplicationController::class,'store']);
    Route::delete('/destroy/{order}',[ApplicationController::class,'destroy']);
});


// Deals
Route::prefix('deal')->group(function (){
    Route::get('/my/deals',[DealController::class,'index'])->middleware('auth');
    Route::get('/{deal}', [DealController::class,'view']);
    Route::post('/{deal}/update/customer',[DealController::class,'update_by_mover']);
    Route::post('/{deal}/update/driver',[DealController::class,'update_by_driver']);
    Route::get('/{deal}/update/status/driver/{status}',[DealController::class,'update_status_driver']);
    Route::get('/{deal}/update/status/mover/{status}',[DealController::class,'update_status_mover']);
    Route::get('/{deal}/close',[DealController::class,'close']);
});

Route::group(['prefix' => '/profile', 'middleware' => ['auth']], function (){
    Route::get('/', [UserController::class,'index'])->name('profile');
    Route::post('/change/password', [UserController::class,'change_password']);
    Route::post('/edit',[UserController::class, 'update']);
    Route::get('/list',[UserController::class,'list']);
});




