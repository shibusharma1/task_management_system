<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('login',[AuthController::class,'login']);


Route::fallback(function () {
    return view('errors.404');
});