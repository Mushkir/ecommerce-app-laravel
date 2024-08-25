<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
