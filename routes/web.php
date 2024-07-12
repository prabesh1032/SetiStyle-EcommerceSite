<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PagesController::class, 'home'])->name('home');
Route::get('/about',[PagesController::class, 'about'])->name('about');
Route::get('/contact',[PagesController::class, 'contact'])->name('contact');
Route::get('/categoryproduct/{id}',[PagesController::class,'categoryproduct'])->name('categoryproduct');

Route::get('/dashboard', [DashboardController::class,'dashboard'])->middleware(['auth',
'verified'])->name('dashboard');

Route::middleware('auth')->group(function(){

Route::get('/categorie', [CategoryController:: class, 'index'])->name('categories.index');
Route::get('/categorie/create', [CategoryController:: class, 'create'])->name('categories.create');
Route::post('/categorie/store', [CategoryController:: class, 'store'])->name('categories.store');
Route::get('/categorie/{id}/edit', [CategoryController:: class, 'edit'])->name('categories.edit');
Route::post('/categorie/{id}/update', [CategoryController:: class, 'update'])->name('categories.update');
Route::get('/categorie/{id}/destroy', [CategoryController:: class, 'destroy'])->name('categories.destroy');


Route::get('/brand', [BrandController:: class, 'index'])->name('brand.index');
Route::get('/brand/create', [BrandController:: class, 'create'])->name('brand.create');
Route::post('/brand/store', [BrandController:: class, 'store'])->name('brand.store');
Route::get('/brand/{id}/edit', [BrandController:: class, 'edit'])->name('brand.edit');
Route::post('/brand/{id}/update', [BrandController:: class, 'update'])->name('brand.update');
Route::get('/brand/{id}/destroy', [BrandController:: class, 'destroy'])->name('brand.destroy');


Route::get('/products', [ProductController:: class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController:: class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController:: class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [ProductController:: class, 'edit'])->name('products.edit');
Route::post('/products/{id}/update', [ProductController:: class, 'update'])->name('products.update');
Route::get('/products/{id}/destroy', [ProductController:: class, 'destroy'])->name('products.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
