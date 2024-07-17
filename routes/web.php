<?php

use App\Http\Controllers\NFTGalleryController;
use App\Http\Controllers\WLCheckerController;
use App\Http\Controllers\PFPBuilderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PFPBuilderController::class, 'index']);
Route::get('/nft-gallery', [NFTGalleryController::class, 'index']);
Route::post('/nft-gallery/build', [NFTGalleryController::class, 'build']);

if (config('app.wl_checker_enabled')) {
    Route::get('/wl-checker', [WLCheckerController::class, 'index']);
    Route::post('/wl-checker', [WLCheckerController::class, 'search']);
}
