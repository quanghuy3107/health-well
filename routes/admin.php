<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UploadController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Upload
    Route::post('/upload/image', [UploadController::class, 'uploadImage'])->name('upload.image');
    Route::post('/upload/editor-image', [UploadController::class, 'uploadEditorImage'])->name('upload.editor-image');

    // Products
    Route::resource('products', ProductController::class);

    // Categories
    Route::resource('categories', CategoryController::class);

    // Blog Posts
    Route::resource('blog', BlogPostController::class);

    // Blog Categories
    Route::resource('blog-categories', BlogCategoryController::class)->except(['show']);

    // Users
    Route::resource('users', UserController::class);

    // Campaigns
    Route::resource('campaigns', CampaignController::class);

    // Settings
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
});
