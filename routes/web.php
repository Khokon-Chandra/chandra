<?php

use khokonc\mvc\Route\Route;
use app\Controllers\ClientController;
use app\Controllers\HomeController;
use app\Controllers\UserController;

//auth routes
include(BASE_URL."/routes/auth.php");
//web routes

Route::group(['middleware'=>'auth'],function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');


    Route::resource('clients', ClientController::class);
    Route::resource('users', UserController::class);

    Route::post('clients',[ClientController::class,'search'])->name('clients.search');
});


