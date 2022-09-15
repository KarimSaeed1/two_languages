<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function() {
    Route::group(['prefix' => 'offers'], function () {
        Route::get('create', [App\Http\Controllers\OfferController::class, 'create']);
        Route::post('store', [App\Http\Controllers\OfferController::class, 'store'])->name('store');
        Route::get('show',[App\Http\Controllers\OfferController::class,'show']);
    });
});
