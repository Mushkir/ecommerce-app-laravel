<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'admin']);

Route::get('/add_category', [AdminController::class, 'viewCategory'])->middleware(['auth', 'admin']);

Route::post('/store', [AdminController::class, 'store'])->middleware(['auth', 'admin']);

Route::get('/show/{id}', [AdminController::class, 'show'])->middleware(['auth', 'admin']);

Route::post('update/{id}', [AdminController::class, 'update'])->middleware(['auth', 'admin']);

Route::get('/destroy/{id}', [AdminController::class, 'destroy'])->middleware(['auth', 'admin']);

// Products
// Route::get('/products', [ProductController::class, 'index'])->middleware(['auth', 'admin']);

Route::middleware(['auth', 'admin'])->prefix('products')->group(function () {

    Route::get('/', [ProductController::class, 'index']);

    Route::get('/add_product', [ProductController::class, 'create']);

    Route::post('/store', [ProductController::class, 'store']);

    Route::get('/edit_product/{id}', [ProductController::class, 'edit']);

    Route::post('/update_product/{id}', [ProductController::class, 'update']);

    Route::get('/delete_product/{id}', [ProductController::class, 'destroy']);

    Route::get('/search_product', [ProductController::class, 'search_product']);
});

Route::get('/view_product_detail/{id}', [ProductController::class, 'show']);

Route::get('/add_to_cart/{id}', [CartController::class, 'store'])->middleware(['auth', 'verified']);

Route::get('/view_cart', [CartController::class, 'index'])->middleware(['auth', 'verified']);

Route::get('/remove_cart_item/{id}', [CartController::class, 'destroy'])->middleware(['auth', 'verified']);

Route::post('/confirm_order', [OrderController::class, 'store'])->middleware(['auth', 'verified']);

Route::get('/view_my_orders', [OrderController::class, 'index'])->middleware(['auth', 'verified']);

Route::get('/orders', [OrderController::class, 'showAll'])->middleware(['auth', 'admin']);
