<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\HomeController as MyPageController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/mypage', [MyPageController::class, 'index'])->name('mypage');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
