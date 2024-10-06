<?php


use App\Controllers\HomeController;
use PhpMvc\Http\Route;

Route::get('/', function() { echo 'hello';});
Route::get('/home',[HomeController::class,'index']);