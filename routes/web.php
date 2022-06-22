<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaytmController;
use App\Http\Controllers\SubscribeController;
use App\Http\Middleware\IsUserLoggedIn;
use App\Http\Middleware\RedirectIfSessionIsPresent;
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
//Front End Routes
Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('login', function () {
    return view('login');
})->name('login');
Route::get('subscribe', [SubscribeController::class, 'index'])->name('subscribe');

//Back End Routes
Route::middleware([RedirectIfSessionIsPresent::class])
// ->withoutMiddleware([IsUserLoggedIn::class])
    ->group(function () {
        Route::get('/admin', function () {
            return view('auth.login');
        });
    });
Route::middleware([IsUserLoggedIn::class])
// ->withoutMiddleware([RedirectIfSessionIsPresent::class])
    ->group(function () {
        Route::post('/index', [LoginController::class, 'index']);
        Route::get('/students', [OrderController::class, 'index'])->name('students');
        Route::get('/students/{payment_id}', [OrderController::class, 'edit']);
        Route::post('/students/update', [OrderController::class, 'update']);
        Route::get('/orders', [OrderController::class, 'orderList'])->name('orders');
        Route::get('/class', [ClassController::class, 'index'])->name('class');
        Route::get('/class/{id}', [ClassController::class, 'edit']);
        Route::post('/class/update', [ClassController::class, 'update']);
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    });

//Paytm Payment
Route::post('paytm-payment', [PaytmController::class, 'paytmPayment'])->name('paytm.payment');
Route::post('paytm-callback', [PaytmController::class, 'paytmCallback'])->name('paytm.callback');
