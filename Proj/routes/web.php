<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserLoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' =>['guest']], function(){
    Route::post('checkUserLogin','App\Http\Controllers\UserLoginController@checkLogin')
        ->name("checkUserLogin");
    Route::get('/','App\Http\Controllers\UserLoginController@show')
        ->name("userLogin");
    Route::get('userRegister','App\Http\Controllers\UserLoginController@showRegister')
        ->name('userRegister');
    Route::get('productRegister','App\Http\Controllers\ProductRegisterController@show')
        ->name('productRegister');
    Route::post('doUserRegister', 'App\Http\Controllers\UserLoginController@register')
        ->name('register');
    Route::post("doProductRegister",'App\Http\Controllers\ProductRegisterController@registerProduct')
        ->name('registerProduct');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('home',[HomeController::class, 'show'])
        ->name("all");
    Route::get('userLogout',[UserLoginController::class,'logout'])
        ->name('userLogout');
    Route::get('productDetail/{id}',[HomeController::class, 'showDetail'])
        ->name("productDetail");
    Route::post('checkProductBid',[HomeController::class, 'checkProductBid'])
        ->name('checkProductBid');
    Route::get('showProductBid',[HomeController::class, 'showProductBid'])
        ->name('showProductBid');
});





