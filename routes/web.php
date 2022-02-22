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
    Route::get('/news_letter',[NewsletterController::class,'index'])->name('news_letter.index');
    Route::post('/news_letter',[NewsletterController::class,'store'])->name('news_letter.store');

    Route::get('/posts',[PostController::class,'index'])->name('posts.index');
    Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
    Route::post('/posts',[PostController::class,'store'])->name('posts.store');
});


