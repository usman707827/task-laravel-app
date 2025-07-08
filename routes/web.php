<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Welcome/Landing page
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
})->name('welcome');

// Authentication routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();
        $tasksCount = $user->tasks()->count();
        $pendingTasks = $user->tasks()->where('status', 'pending')->count();
        $inProgressTasks = $user->tasks()->where('status', 'in_progress')->count();
        $completedTasks = $user->tasks()->where('status', 'completed')->count();
        $recentTasks = $user->tasks()->latest()->take(5)->get();

        return view('dashboard', compact(
            'tasksCount',
            'pendingTasks',
            'inProgressTasks',
            'completedTasks',
            'recentTasks',
        ));
    })->name('dashboard');
    Route::resource('tasks', TaskController::class);
});

Route::fallback(function () {
    if(!Auth::check()) {
        return redirect()->route('welcome');
    }
    return redirect()->route('dashboard');
});
