<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PerformanceController;
use App\Http\Controllers\OpenAiDemoController;

// Frontend Routes
Route::get('/', [ShopController::class, 'index'])->name('shop.index');
Route::get('/product/{id}', [ShopController::class, 'show'])->name('shop.product');
Route::get('/articles', [ShopController::class, 'articles'])->name('shop.articles');
Route::get('/article/{id}', [ShopController::class, 'article'])->name('shop.article');
Route::get('/about', [ShopController::class, 'about'])->name('shop.about');

// OpenAI Demo Route
Route::post('/openai/chat', [OpenAiDemoController::class, 'chat'])->name('openai.chat');

// Admin Auth Routes
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Admin Routes (Protected)
Route::middleware('admin.auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('products', ProductController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('about', AboutController::class)->only(['index', 'edit', 'update']);
    Route::resource('users', UserController::class);
    Route::resource('performance', PerformanceController::class)->only(['index']);
    Route::post('performance/generate', [PerformanceController::class, 'generateCopy'])->name('performance.generate');
    Route::post('performance/analyze', [PerformanceController::class, 'analyzePerformance'])->name('performance.analyze');
   });

