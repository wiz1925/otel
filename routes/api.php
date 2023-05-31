<?php

use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ReservationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'reservations'], function(){
   Route::get('/list', [ReservationController::class, 'index']);
   Route::post('/store', [ReservationController::class, 'store']);
    Route::get('/destroy/{reservationId}', [ReservationController::class, 'destroy']);
});

Route::group(['prefix' => 'reservation_discounts'], function(){
    Route::get('/calculate', [DiscountController::class, 'calculate']);
});
