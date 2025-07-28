<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('login',[AuthController::class,'login']);
Route::get('register',[AuthController::class,'register']);

Route::fallback(function () {
    return view('errors.404');
});