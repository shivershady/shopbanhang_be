<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\VariantController;
Route::prefix('/admin')->group(function () {

    Route::prefix('/category')->group(function () {
        Route::get('/', [CategoryController::class, 'list'])->name('admin.category.list');
        Route::get('/add', [CategoryController::class, 'add'])->name('admin.category.add');
        Route::post('/add', [CategoryController::class, 'doAdd'])->name('admin.category.doAdd');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('/edit/{id}', [CategoryController::class, 'doEdit'])->name('admin.category.doEdit');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    });

    Route::prefix('/product')->group(function (){
        Route::get('/', [ProductController::class, 'list'])->name('admin.product.list');
        Route::get('/search', [ProductController::class, 'search'])->name('admin.product.search');
        Route::get('/add', [ProductController::class, 'add'])->name('admin.product.add');
        Route::post('/do-add', [ProductController::class, 'doAdd'])->name('admin.product.doAdd');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('/edit/{id}', [ProductController::class, 'doEdit'])->name('admin.product.doEdit');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');
    });

    Route::prefix('/user')->group(function () {
        Route::get('/',[UserController::class,'List'])->name('admin.user.list');
        Route::get('/add', [UserController::class, 'add'])->name('admin.user.add');
        Route::post('/do-add', [UserController::class, 'doAdd'])->name('admin.user.doAdd');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/edit/{id}', [UserController::class, 'doEdit'])->name('admin.user.doEdit');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
    });

    Route::prefix('/variant')->group(function () {
        Route::get('/', [VariantController::class, 'list'])->name('admin.variant.list');
        Route::get('/add', [VariantController::class, 'add'])->name('admin.variant.add');
        Route::post('/do-add', [VariantController::class, 'doAdd'])->name('admin.variant.doAdd');
        Route::get('/edit/{id}', [VariantController::class, 'edit'])->name('admin.variant.edit');
        Route::post('/edit/{id}', [VariantController::class, 'doEdit'])->name('admin.variant.doEdit');
        Route::get('/delete/{id}', [VariantController::class, 'delete'])->name('admin.variant.delete');
    });
});




