<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('login', LoginController::class);

Route::middleware(['isLogin', 'CekRole:Admin,Staff'])->group(function () {
    Route::get('/', [Controller::class, 'index'])->name('dashboard');
    Route::resource('room', RoomController::class);
    Route::resource('reservasi',ReservasiController::class);
    Route::resource('customer', CustomerController::class);
});

Route::middleware(['isLogin', 'CekRole:Admin'])->group(function () {
    Route::resource('user', UserController::class);
});