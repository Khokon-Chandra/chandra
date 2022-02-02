<?php

use app\Controllers\Auth\LoginController;
use app\Controllers\HomeController;
use core\Request;
use core\Route;



Route::get('/',[HomeController::class,'index']);
Route::post('/store',[HomeController::class,'store']);

Route::get('login',[LoginController::class,'create']);
Route::post('/login',[LoginController::class,'store'])->name('login.store');
