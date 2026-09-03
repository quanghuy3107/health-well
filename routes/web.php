<?php

use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SearchController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    try {
        $categories = \App\Models\BlogCategory::active()->orderBy('sort_order')->get();
        $latestPosts = \App\Models\BlogPost::published()
            ->orderBy('created_at', 'desc')
            ->paginate(9);
    } catch (\Exception $e) {
        $categories = collect();
        $latestPosts = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 9);
    }

    return view('landing', compact('categories', 'latestPosts'));
});
Route::get('/search', SearchController::class)->name('search');


Route::get('/category/{slug}', [PageController::class, 'blogCategory'])->name('category.show');
Route::get('/product/{slug}', [PageController::class, 'showProduct'])->name('product.detail');

// Legacy routes (redirect to new category URLs)
Route::get('/training/best-whey-protein-home-gear', function () {
    return redirect()->route('category.show', 'training', 301);
});
Route::get('/health/smart-home-wellness-tools', function () {
    return redirect()->route('category.show', 'health', 301);
});

// Route dành cho Link Cloaking
Route::get('/go/{slug}', [AffiliateController::class, 'redirect'])->name('affiliate.go');

// Blog Routes
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');

// Contact Route
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');
