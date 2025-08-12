<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

Route::get('/',[PagesController::class, 'home'])->name('home');
Route::get('/about',[PagesController::class, 'about'])->name('about');
Route::get('/contact',[PagesController::class, 'contact'])->name('contact');
Route::get('/categoryproduct/{id}',[PagesController::class,'categoryproduct'])->name('categoryproduct');
Route::get('/viewproduct/{id}',[PagesController::class,'viewproduct'])->name('viewproduct');

Route::middleware('auth')->group(function(){
    Route::post('cart/store',[CartController::class,'store'])->name('cart.store');
    Route::get('mycart',[CartController::class,'mycart'])->name('mycarts');
    Route::delete('cart/destroy',[CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('checkout/{id}',[CartController::class,'checkout'])->name('checkout');
    Route::post('order/store',[OrderController::class,'store'])->name('order.store');
    Route::post('order/prepare-esewa',[OrderController::class,'prepareEsewa'])->name('order.prepareEsewa');
    Route::get('order/{cartid}/storeEsewa', [OrderController::class, 'storeEsewa'])->name('order.storeEsewa');
});

Route::get('/dashboard', [DashboardController::class,'dashboard'])->middleware(['auth',
'isadmin'])->name('dashboard');

Route::middleware(['auth','isadmin'])->group(function(){

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

//orders
Route::get('/orders',[OrderController::class,'index'])->name('orders.index');
Route::get('/orders/{id}/status/{ststus}',[OrderController::class,'status'])->name('orders.status');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
