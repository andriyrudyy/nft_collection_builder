<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PFPBuilderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::post('/', [HomeController::class, 'search']);
Route::get('/pfp-builder', [PFPBuilderController::class, 'index']);
