<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WelcomeController;
use App\Http\Livewire\ShoppingCart;
use Illuminate\Support\Facades\Route;

Route::get('/',WelcomeController::class);

Route::get('search',SearchController::class)->name('search');

Route::get('categories/{category}',[CategoryController::class,'show'])->name('categories.show');

Route::get('products/{product}',[ProductController::class,'show'])->name('products.show');


Route::get('shopping-cart',ShoppingCart::class)->name('shopping-cart');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('prueba',function(){
    \Cart::destroy();
});
