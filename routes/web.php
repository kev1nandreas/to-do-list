<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Container\Attributes\Auth;
use App\Http\Controllers\RegisterController;
use Illuminate\Routing\Route as RoutingRoute;

Route::get('/', function () {
    if (auth()->check() == false) {
        return redirect('/login');
    }

    return view('landingpage');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [LoginController::class, 'authenticate']);


// Route::get('/logout', [LoginController::class, 'logout']);

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index']);
