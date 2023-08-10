<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductStocksController;
use App\Http\Controllers\ReturnProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;



Route::get('/', function () {
    return redirect()->route('login');
});

require __DIR__.'/auth.php';


Route::middleware(['auth'])->group(function(){

    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //category
    Route::resource('category', CategoryController::class);
    Route::get('/api/categories', [CategoryController::class, 'getCategoriesJson']);

    //brands
    Route::resource('brand', BrandController::class);
    Route::get('/api/brands', [BrandController::class, 'getBrandsJson']);

    //sizes
    Route::resource('size', SizeController::class);
    Route::get('/api/sizes', [SizeController::class, 'getSizesJson']);

    //procucts
    Route::resource('product', ProductController::class);
    Route::get('/api/products', [ProductController::class, 'getProductsJson']);

    //product stocks
    Route::get('/stocks', [ProductStocksController::class, 'product_stocks'])->name('stocks');
    Route::post('/stock', [ProductStocksController::class, 'stocks_submit'])->name('stocks-submit');
    Route::get('/stocks-history', [ProductStocksController::class, 'stocks_history'])->name('stocks-history');

    //return product
    Route::get('/return-product', [ReturnProductController::class, 'return_product'])->name('return-product');
    Route::post('/return', [ReturnProductController::class, 'return_product_submit'])->name('return-product-submit');
    Route::get('/return-product-history', [ReturnProductController::class, 'return_product_history'])->name('return-product-history');


    //user
    Route::resource('user', UserController::class);



});

    


