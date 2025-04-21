<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController; 

Route::get('/', function () {
    return redirect()->route('dashboard'); 
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('products', ProductController::class);
Route::resource('distributors', DistributorController::class); 
Route::resource('categories', CategoryController::class);