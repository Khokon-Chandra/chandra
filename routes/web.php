<?php

use Khokonc\Mvc\Routing\Route;
use App\Controllers\ProjectController;
use App\Controllers\HomeController;
use App\Controllers\UserController;

//auth routes
include(BASE_URL."/routes/auth.php");
//web routes


Route::group(['middleware'=>'auth'],function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('projects', ProjectController::class);
    Route::resource('users', UserController::class);
    Route::post('projects/search',[ProjectController::class,'search'])->name('projects.search');
});


Route::get('/post/{id}/page/{name}',function ($request,$id,$name){
    echo $id;
    echo $name;
});