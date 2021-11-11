<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;


Route::get('/',WelcomeController::class);

Route::get('categories/{category}',[CategoryController::class,'show'])->name('categories.show');

Route::get('products/{product}',[ProductController::class,'show'])->name('products.show');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
