<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BerandaOperatorController;  
use App\Http\Controllers\BerandaWaliController;
/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Di bawah ini adalah definisi route untuk aplikasi Anda.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Rute untuk Autentikasi
Auth::routes();

// Khusus Operator
Route::prefix('operator')->middleware(['auth', 'auth.operator'])->group(function () {
        Route::get('/beranda', [BerandaOperatorController::class, 'index'])->name('operator.beranda');
        Route::resource('user', UserController::class);
});
// Khusus wali
Route::prefix('wali')->middleware(['auth', 'auth.wali'])->group(function () {
    Route::get('/beranda', [BerandaWaliController::class, 'index'])->name('wali.beranda');
});
// Khusus admin
Route::prefix('admin')->middleware(['auth', 'auth.admin'])->group(function () {

});

// Rute Logout
Route::get('logout', function () {
    Auth::logout();  
    return redirect('login');  
});
