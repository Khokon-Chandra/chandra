<?php

use core\Route;
use app\Controllers\Auth\LoginController;
use app\Controllers\Auth\RegisterController;
use app\Controllers\HomeController;

// Auth Route start

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [LoginController::class, 'create'])->name('login.create');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
    Route::post('/logout', [LoginController::class, 'destroy'])->name('login.destroy');

    Route::get('/register',[RegisterController::class,'create'])->name('register.create');
    Route::post('/register',[RegisterController::class,'store'])->name('register.store');
});

// Auth route end here



Route::group(['middleware'=>'auth'],function(){
    Route::get('/', [HomeController::class, 'index']);
    Route::post('/store', [HomeController::class, 'store']);
});

Route::get('/user/{id}',function(){
    return 'param';
})->name('param');