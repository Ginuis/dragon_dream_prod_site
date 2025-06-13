<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MediaController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/a-propos', [HomeController::class, 'about']);
Route::get('/inscription', [RegisterController::class, 'create']);
Route::post('/inscription', [RegisterController::class, 'store']);
Route::get('/galerie', [MediaController::class, 'index']);




//use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

