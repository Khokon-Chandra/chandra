<?php

use app\Controllers\HomeController;
use core\Route;

Route::get('/',[HomeController::class,'index']);
Route::post('/store',[HomeController::class,'store'])->name('store');