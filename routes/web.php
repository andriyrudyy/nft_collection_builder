<?php

use App\Http\Controllers\WLCheckerController;
use App\Http\Controllers\PFPBuilderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PFPBuilderController::class, 'index']);
Route::get('/wl-checker', [WLCheckerController::class, 'index']);
Route::post('/wl-checker', [WLCheckerController::class, 'search']);
