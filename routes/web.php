<?php

use Carbon\Carbon;
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

    $tasks = auth()->user()->tasks
        ->sortBy('due_date', SORT_REGULAR, false)
        ->sortBy('status', SORT_REGULAR, false)
        ->map(function ($task) {
            $task->time_to_due_date = Carbon::now()->diffForHumans(Carbon::parse($task->due_date));
            return $task;
        });

    $count = $tasks->filter(function ($task) {
        $dueDate = Carbon::parse($task->due_date);
        return !$task->status && Carbon::now()->diffInDays($dueDate, false) <= 2;
    })->count();

    $date2forward = now()->addDays(2)->format('l, d M Y');

    return view('dashboard', [
        'tasks' => $tasks,
        'count' => $count,
        'date2forward' => $date2forward
    ]);
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

Route::get('/profile/changepassword', [ProfileController::class, 'editpass'])->middleware('auth');

Route::post('/profile/newpassword', [ProfileController::class, 'changePassword'])->name('profile.changePassword')->middleware('auth');

Route::resource('/profile', ProfileController::class)->middleware('auth');

Route::resource('/task', TaskController::class)->middleware('auth');

Route::get('/task/{task}/changestatus', [TaskController::class, 'status'])->middleware('auth');

Route::get('/find', [TaskController::class, 'find'])->middleware('auth');
