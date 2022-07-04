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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/', [App\Http\Controllers\UserController::class, 'loginForm']);
Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout']);
Route::get('/login', [App\Http\Controllers\UserController::class, 'loginForm'])->name('login');
Route::post('/accountLogin', [App\Http\Controllers\UserController::class, 'accountLogin'])->name('accountLogin');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/exchange_rates_api', [App\Http\Controllers\UserController::class, 'exchangeratesapi']);
    Route::post('/call_exchange_rates_api', [App\Http\Controllers\UserController::class, 'callExchangeRatesApi'])->name('call_exchange_rates_api');
});