<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;

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

});
