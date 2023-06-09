<?php

use Khokonc\Mvc\Routing\Route;
use App\Controllers\HomeController;
use App\Controllers\UserController;

//auth routes
include(__DIR__."/auth.php");
//web routes

Route::group(['middleware'=>'auth'],function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('users', UserController::class);
});
