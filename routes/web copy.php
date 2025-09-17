<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DesignationController;

Route::get('/', function () {
    return view('home');
})->name('home');


// Auths
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register/store', [AuthController::class, 'store'])->name('register.store');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login-authenticate', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');





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
      Route::get('admin/designations', [DesignationController::class, 'index'])->name('designations.index');
    Route::post('admin/designations', [DesignationController::class, 'store'])->name('designations.store');
    Route::get('admin/designations/{designation}/edit', [DesignationController::class, 'edit'])->name('designations.edit');
    Route::put('admin/designations/{designation}', [DesignationController::class, 'update'])->name('designations.update');
    Route::delete('admin/designations/{designation}', [DesignationController::class, 'destroy'])->name('designations.destroy');

    // user routes
     Route::get('admin/users', [UserController::class, 'index'])->name('users.index');
    Route::post('admin/users/store', [UserController::class, 'store'])->name('users.store');
    Route::put('admin/users/update/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('admin/users/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');



});

// Group for Admin and Manager (role:0,1)
Route::middleware(['auth', 'role:0,1'])->group(function () {
    // Route::get('tasks', [TasksController::class, 'index'])->name('task');

});

// Group for All Roles (role:0,1,2)
Route::middleware(['auth', 'role:0,1,2'])->group(function () {
    Route::get('tasks', [TasksController::class, 'index'])->name('task.index');
    Route::get('reminders', [ReminderController::class, 'index'])->name('reminder.index');

    Route::get('attendance', [AttendanceController::class, 'index'])->name('attendance.index');
    Route::post('attendance', [AttendanceController::class, 'store'])->name('attendance.store');
});

Route::fallback(function () {
    return view('errors.404');
});