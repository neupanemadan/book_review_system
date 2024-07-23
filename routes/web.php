<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\HomeController as MyPageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\BookController;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/mypage', [MyPageController::class, 'index'])->name('mypage');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('books', BookController::class);
});
