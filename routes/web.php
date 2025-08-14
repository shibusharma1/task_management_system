<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\TasksController;

Route::get('/', function () {
    return view('home');
})->name('home');


// Auths
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register/store', [AuthController::class, 'store'])->name('register.store');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login-authenticate', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
// Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');




Route::get('/clear-all', function () {
    if (app()->environment('local')) {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return 'Cleared in local environment!';
    }
    abort(403);
});

// Group for Admin only (role:0)
Route::middleware(['auth', 'role:0'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

});

// Group for Admin and Manager (role:0,1)
Route::middleware(['auth', 'role:0,1'])->group(function () {
    Route::get('tasks', [TasksController::class, 'tasks'])->name('task');

});

// Group for All Roles (role:0,1,2)
Route::middleware(['auth', 'role:0,1,2'])->group(function () {
    Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');
});

Route::fallback(function () {
    return view('errors.404');
});