<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('homepage');

// route untuk dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
});

// route auth check
Route::get('/login', function () { 
    if(Auth::check()){
        return view('dashboard');
    }else{
        return view('loginpage');
    }
});

//route mengarah ke halaman login di views/loginsea.blade.php
Route::get('/login', function () {
    return view('loginpage');
});

// Route::get('/login', [AuthController::class, 'index'])->name('login');

//route untuk proses login
Route::post('/authenticate',[AuthController::class, 'authenticate'])->name('authenticate');

//route untuk logout
Route::get('/logout',[AuthController::class, 'logout'])->name('logout');

/*Buatkan route untuk ke halaman login dan halaman lainnya */