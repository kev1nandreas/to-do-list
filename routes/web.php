<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Routing\Route as RoutingRoute;

Route::get('/', function () {
    if (auth()->check() == false) {
        return redirect('/login');
    }

    return view('dashboard');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index']);

Route::resource('/profile', ProfileController::class)->middleware('auth');
