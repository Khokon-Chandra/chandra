<?php

use App\Controllers\Auth\ForgotPasswordController;
use App\Controllers\Auth\LoginController;
use App\Controllers\Auth\RegisterController;
use khokonc\mvc\Routing\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [LoginController::class, 'create'])->name('login.create');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
    Route::post('/logout', [LoginController::class, 'destroy'])->name('login.destroy');

    Route::get('/register',[RegisterController::class,'create'])->name('register.create');
    Route::post('/register',[RegisterController::class,'store'])->name('register.store');
    
    Route::get('/forgot_password',[ForgotPasswordController::class,'create'])->name('forgot.create');
    Route::post('/forgot_password',[ForgotPasswordController::class,'store'])->name('forgot.store');
});