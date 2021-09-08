<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

route::get('/', function(){
    return redirect()->route('auth.login');
});

/* ==== Authentication ==== */
Route::get('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/auth/register', [AuthController::class, 'register'])->name('auth.register');

/* === Validations=== */
Route::post('/auth/save', [AuthController::class, 'save'])->name('auth.save');
Route::post('/auth/check', [AuthController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/panel', [AuthController::class, 'panel'])->name('panel');