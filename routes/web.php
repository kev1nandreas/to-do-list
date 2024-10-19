<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Routing\Route as RoutingRoute;

Route::get('/', function () {
    if (auth()->check() == false) {
        return redirect('/login');
    }

    return view('dashboard', ['tasks' => auth()->user()->tasks->sortBy('due_date', SORT_REGULAR, true)->sortBy('status', SORT_REGULAR, true)]);
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/debug', function () {
    return view('test');
});

Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index']);

Route::get('/profile/changepassword', [ProfileController::class, 'editpass']);

Route::post('/profile/newpassword', [ProfileController::class, 'changePassword'])->name('profile.changePassword');;

Route::resource('/profile', ProfileController::class)->middleware('auth');

Route::resource('/task', TaskController::class)->middleware('auth');

Route::get('/task/{task}/changestatus', [TaskController::class, 'status'])->middleware('auth');
