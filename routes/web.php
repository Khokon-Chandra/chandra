<?php

use core\Route;
use app\Controllers\HomeController;
use app\Controllers\NewsletterController;
use app\Controllers\PostController;

//auth routes
include(BASE_URL."/routes/auth.php");
//web routes

Route::group(['middleware'=>'auth'],function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
});


