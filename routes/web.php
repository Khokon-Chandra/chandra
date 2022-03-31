<?php

use app\Controllers\ClientController;
use core\Route;
use app\Controllers\HomeController;
use app\Controllers\UserController;

//auth routes
include(BASE_URL."/routes/auth.php");
//web routes

Route::group(['middleware'=>'auth'],function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/clients',[ClientController::class,'index'])->name('clients.index');

    Route::resource('users', UserController::class);
});


