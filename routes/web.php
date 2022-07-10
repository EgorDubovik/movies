<?php

use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\FavoriteController;

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
    Route::get('/search', [OrderController::class, 'search_view']);
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
    Route::post('/send/{order}',[ApplicationController::class,'store']);
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


//Profile
Route::group(['prefix' => '/profile', 'middleware' => ['auth']], function (){
    Route::get('/', [UserController::class,'index'])->name('profile');
    Route::get('/view/{user}',[UserController::class,'view']);
    Route::post('/change/password', [UserController::class,'change_password']);
    Route::post('/edit',[UserController::class, 'update']);
    Route::get('/list',[UserController::class,'list']);
});

//Rating
Route::group(['middleware' => ['auth']],function (){
   Route::post('/rating/send/{receiver}', [RatingController::class,'create']);
});


// Notifications
Route::group(['prefix' => 'notifications', 'middleware' => ['auth']],function (){
    Route::get('/read/{notification}', [NotificationController::class, 'read']);
    Route::get('/', [NotificationController::class, 'index']);
});

// Favorite

Route::group(['prefix' => 'favorite', 'middleware' => ['auth']], function (){
   Route::get('/add/{user}', [FavoriteController::class, 'add_to_favorite']);
   Route::get('/remove/{user}', [FavoriteController::class, 'delete']);
});




