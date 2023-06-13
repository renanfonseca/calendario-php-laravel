<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/calendario', [CalendarioController::class, 'index']);
