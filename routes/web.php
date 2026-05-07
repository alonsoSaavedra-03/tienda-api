<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UserController;
use App\Models\Career;

Route::get('/', function () {
    $careers = Career::all();

    return view('register',compact('careers'));
});
Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('login/google'
, [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle']);
Route::get('login/google/callback'
, [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
});
