<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [HomeController::class, 'redirect'])->name('redirect');


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/category', [AdminController::class, 'category'])->name('admin.category');
    Route::post('/addcategory', [AdminController::class, 'add_category'])->name('add_catogory');
    Route::get('/deletecategory/{id}', [AdminController::class, 'delete_category'])->name('delete_category');

    Route::get('/viewproductspage_1', [AdminController::class, 'view_product1'])->name('admin.view_product1');
    Route::post('/addproduct', [AdminController::class, 'add_product'])->name('add_product');

    Route::get('/viewproductspage_2', [AdminController::class, 'view_product2'])->name('admin.view_product2');
    Route::get('/deleteproduct/{id}', [AdminController::class, 'delete_product'])->name('delete_product');


    Route::get('/viewproductspage_3/{id}', [AdminController::class, 'view_product3'])->name('admin.view_product3');
    Route::post('/updateproduct/{id}', [AdminController::class, 'update_product'])->name('update_product');
});


Route::middleware(['auth', 'user'])->prefix('user')->group(function () {
    Route::get('/products', [UserController::class, 'productsPage'])->name('user.productsPage');
    Route::get('/products-detail/{id}', [UserController::class, 'productDetailPage'])->name('user.detailPage');
    Route::post('/addcart/{id}', [UserController::class, 'add_cart'])->name('add_cart');
});
