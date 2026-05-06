<?php

use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = json_decode(file_get_contents(storage_path('app/products.json')), true);
    
    $trainingProducts = collect($products)->where('category', 'training')->take(1);
    $healthProducts = collect($products)->where('category', 'health')->take(3);
    
    $trendingProducts = $healthProducts->merge($trainingProducts);

    return view('landing', compact('trendingProducts'));
});

Route::get('/training/best-whey-protein-home-gear', [PageController::class, 'training'])->name('training');
Route::get('/health/smart-home-wellness-tools', [PageController::class, 'health'])->name('health');
Route::get('/product/{slug}', [PageController::class, 'showProduct'])->name('product.detail');

// Route dành cho Link Cloaking
Route::get('/go/{slug}', [AffiliateController::class, 'redirect'])->name('affiliate.go');

// Blog Routes
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');

// Contact Route
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
