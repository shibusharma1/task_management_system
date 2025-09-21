<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\InstitutionsController;
use App\Http\Controllers\TaskCategoryController;
use App\Http\Controllers\EmployeeDetailController;

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
Route::prefix('admin')->middleware(['auth', 'role:0'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('designations', [DesignationController::class, 'index'])->name('designations.index');
    Route::post('designations', [DesignationController::class, 'store'])->name('designations.store');
    Route::get('designations/{designation}/edit', [DesignationController::class, 'edit'])->name('designations.edit');
    Route::put('designations/{designation}', [DesignationController::class, 'update'])->name('designations.update');
    Route::delete('designations/{designation}', [DesignationController::class, 'destroy'])->name('designations.destroy');

    // user routes
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::post('users/store', [UserController::class, 'store'])->name('users.store');
    Route::put('users/update/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // ====================
    // Department Routes
    // ====================
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
    Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');
    Route::put('/departments/{department}', [DepartmentController::class, 'update'])->name('departments.update');
    Route::delete('/departments/{department}', [DepartmentController::class, 'destroy'])->name('departments.destroy');

    // ====================
    // Employee Routes
    // ====================
    Route::get('/employees', [EmployeeDetailController::class, 'index'])->name('employees.index');
    Route::post('/employees', [EmployeeDetailController::class, 'store'])->name('employees.store');
    Route::put('/employees/{employee}', [EmployeeDetailController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{employee}', [EmployeeDetailController::class, 'destroy'])->name('employees.destroy');

    // ====================
    // Tasks Routes
    // ====================    
    Route::get('/tasks', [TasksController::class, 'index'])->name('tasks.index');
    Route::get('/my-tasks', [TasksController::class, 'myTask'])->name('task.mytask');
    Route::get('/tasks/create', [TasksController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TasksController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{task}', [TasksController::class, 'show'])->name('tasks.show');
    Route::get('/tasks/{task}/edit', [TasksController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TasksController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TasksController::class, 'destroy'])->name('tasks.destroy');
    Route::get('users/search', [TasksController::class, 'searchUsers'])->name('users.search');

    // Task Priority
    Route::get('priority', [PriorityController::class, 'index'])->name('task.priority');
    Route::post('priority', [PriorityController::class, 'store'])->name('task.priority.store');
    Route::put('task/priority/{priority}', [PriorityController::class, 'update'])->name('task.priority.update');
    Route::delete('priority/{priority}', [PriorityController::class, 'destroy'])->name('task.priority.destroy');

    //Task Category
    Route::get('category', [TaskCategoryController::class, 'index'])->name('task.category');
    Route::post('category', [TaskCategoryController::class, 'store'])->name('task.category.store');
    Route::put('task/category/{category}', [TaskCategoryController::class, 'update'])->name('task.category.update');
    Route::delete('category/{category}', [TaskCategoryController::class, 'destroy'])->name('task.category.destroy');



    Route::prefix('/settings')->name('settings.')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('general');
        Route::post('/', [SettingController::class, 'store'])->name('store');
        Route::put('/{setting}', [SettingController::class, 'update'])->name('update');
        // Institutions Setup
        // Institutions routes
        Route::get('institutions', [InstitutionsController::class, 'index'])->name('institutions');
        Route::get('institutions/create', [InstitutionsController::class, 'create'])->name('institutions.create');
        Route::post('institutions', [InstitutionsController::class, 'store'])->name('institutions.store');
        Route::get('institutions/{institution}', [InstitutionsController::class, 'show'])->name('institutions.show');
        Route::get('institutions/{institution}/edit', [InstitutionsController::class, 'edit'])->name('institutions.edit');
        Route::put('institutions/{institution}', [InstitutionsController::class, 'update'])->name('institutions.update');
        Route::delete('institutions/{institution}', [InstitutionsController::class, 'destroy'])->name('institutions.destroy');
    });
    Route::get('/auditlog',[AuditLogController::class,'index'])->name('auditlog.index');

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

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('designations', [DesignationController::class, 'index'])->name('designations.index');
    Route::post('designations', [DesignationController::class, 'store'])->name('designations.store');
    Route::get('designations/{designation}/edit', [DesignationController::class, 'edit'])->name('designations.edit');
    Route::put('designations/{designation}', [DesignationController::class, 'update'])->name('designations.update');
    Route::delete('designations/{designation}', [DesignationController::class, 'destroy'])->name('designations.destroy');

    // user routes
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::post('users/store', [UserController::class, 'store'])->name('users.store');
    Route::put('users/update/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/destroy/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // ====================
    // Department Routes
    // ====================
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
    Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');
    Route::put('/departments/{department}', [DepartmentController::class, 'update'])->name('departments.update');
    Route::delete('/departments/{department}', [DepartmentController::class, 'destroy'])->name('departments.destroy');

    // ====================
    // Employee Routes
    // ====================
    Route::get('/employees', [EmployeeDetailController::class, 'index'])->name('employees.index');
    Route::post('/employees', [EmployeeDetailController::class, 'store'])->name('employees.store');
    Route::put('/employees/{employee}', [EmployeeDetailController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{employee}', [EmployeeDetailController::class, 'destroy'])->name('employees.destroy');

    // ====================
    // Tasks Routes
    // ====================    
    Route::get('/tasks', [TasksController::class, 'index'])->name('task.index');
    Route::get('/my-tasks', [TasksController::class, 'myTask'])->name('task.mytask');
    Route::get('/tasks/create', [TasksController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TasksController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{task}', [TasksController::class, 'show'])->name('tasks.show');
    Route::get('/tasks/{task}/edit', [TasksController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TasksController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TasksController::class, 'destroy'])->name('tasks.destroy');
    Route::get('users/search', [TasksController::class, 'searchUsers'])->name('users.search');

    // Task Priority
    Route::get('priority', [PriorityController::class, 'index'])->name('task.priority');
    Route::post('priority', [PriorityController::class, 'store'])->name('task.priority.store');
    Route::put('task/priority/{priority}', [PriorityController::class, 'update'])->name('task.priority.update');
    Route::delete('priority/{priority}', [PriorityController::class, 'destroy'])->name('task.priority.destroy');

    //Task Category
    Route::get('category', [TaskCategoryController::class, 'index'])->name('task.category');
    Route::post('category', [TaskCategoryController::class, 'store'])->name('task.category.store');
    Route::put('task/category/{category}', [TaskCategoryController::class, 'update'])->name('task.category.update');
    Route::delete('category/{category}', [TaskCategoryController::class, 'destroy'])->name('task.category.destroy');



    Route::prefix('/settings')->name('settings.')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('general');
        Route::post('/', [SettingController::class, 'store'])->name('store');
        Route::put('/{setting}', [SettingController::class, 'update'])->name('update');
        // Institutions Setup
        // Institutions routes
        Route::get('institutions', [InstitutionsController::class, 'index'])->name('institutions');
        Route::get('institutions/create', [InstitutionsController::class, 'create'])->name('institutions.create');
        Route::post('institutions', [InstitutionsController::class, 'store'])->name('institutions.store');
        Route::get('institutions/{institution}', [InstitutionsController::class, 'show'])->name('institutions.show');
        Route::get('institutions/{institution}/edit', [InstitutionsController::class, 'edit'])->name('institutions.edit');
        Route::put('institutions/{institution}', [InstitutionsController::class, 'update'])->name('institutions.update');
        Route::delete('institutions/{institution}', [InstitutionsController::class, 'destroy'])->name('institutions.destroy');
   
    });
Route::fallback(function () {
    return view('errors.404');
});