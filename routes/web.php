<?php

use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/training/best-whey-protein-home-gear', [PageController::class, 'training'])->name('training');
Route::get('/health/smart-home-wellness-tools', [PageController::class, 'health'])->name('health');
Route::get('/product/{slug}', [PageController::class, 'showProduct'])->name('product.detail');

// Route dành cho Link Cloaking
Route::get('/go/{slug}', [AffiliateController::class, 'redirect'])->name('affiliate.go');
