<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\VariantController;
use App\Http\Controllers\Admin\VariantValueController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\KeywordController;
use App\Http\Controllers\Admin\OrderController;
Route::prefix('/admin')->group(function () {

    Route::prefix('/category')->group(function () {
        Route::get('/', [CategoryController::class, 'list'])->name('admin.category.list');
        Route::get('/add', [CategoryController::class, 'add'])->name('admin.category.add');
        Route::post('/add', [CategoryController::class, 'doAdd'])->name('admin.category.doAdd');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('/edit/{id}', [CategoryController::class, 'doEdit'])->name('admin.category.doEdit');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
        Route::get('/search',[CategoryController::class,'search'])->name('admin.category.search');
    });

    Route::prefix('/product')->group(function (){
        Route::get('/', [ProductController::class, 'list'])->name('admin.product.list');
        Route::get('/search', [ProductController::class, 'search'])->name('admin.product.search');
        Route::get('/add', [ProductController::class, 'add'])->name('admin.product.add');
        Route::post('/do-add', [ProductController::class, 'doAdd'])->name('admin.product.doAdd');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('/edit/{id}', [ProductController::class, 'doEdit'])->name('admin.product.doEdit');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');
        Route::get('/search',[ProductController::class,'search'])->name('admin.product.search');
    });

    Route::prefix('/user')->group(function () {
        Route::get('/',[UserController::class,'List'])->name('admin.user.list');
        Route::get('/add', [UserController::class, 'add'])->name('admin.user.add');
        Route::post('/do-add', [UserController::class, 'doAdd'])->name('admin.user.doAdd');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/edit/{id}', [UserController::class, 'doEdit'])->name('admin.user.doEdit');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
        Route::get('/search',[UserController::class,'search'])->name('admin.user.search');

    });

    Route::prefix('/variant')->group(function () {
        Route::get('/', [VariantController::class, 'list'])->name('admin.variant.list');
        Route::get('/add', [VariantController::class, 'add'])->name('admin.variant.add');
        Route::post('/do-add', [VariantController::class, 'doAdd'])->name('admin.variant.doAdd');
        Route::get('/edit/{id}', [VariantController::class, 'edit'])->name('admin.variant.edit');
        Route::post('/edit/{id}', [VariantController::class, 'doEdit'])->name('admin.variant.doEdit');
        Route::get('/delete/{id}', [VariantController::class, 'delete'])->name('admin.variant.delete');
        Route::get('/search',[VariantValueController::class,'search'])->name('admin.variant.search');

    });

    Route::prefix('/variant_value')->group(function () {
        Route::get('/', [VariantValueController::class, 'list'])->name('admin.variant_value.list');
        Route::get('/add', [VariantValueController::class, 'add'])->name('admin.variant_value.add');
        Route::post('/do-add', [VariantValueController::class, 'doAdd'])->name('admin.variant_value.doAdd');
        Route::get('/edit/{id}', [VariantValueController::class, 'edit'])->name('admin.variant_value.edit');
        Route::post('/edit/{id}', [VariantValueController::class, 'doEdit'])->name('admin.variant_value.doEdit');
        Route::get('/delete/{id}', [VariantValueController::class, 'delete'])->name('admin.variant_value.delete');
        Route::get('/search',[VariantValueController::class,'search'])->name('admin.variant.search');

    });

    Route::prefix('/discount')->group(function () {
        Route::get('/', [DiscountController::class, 'list'])->name('admin.discount.list');
        Route::get('/add', [DiscountController::class, 'add'])->name('admin.discount.add');
        Route::post('/do-add', [DiscountController::class, 'doAdd'])->name('admin.discount.doAdd');
        Route::get('/edit/{id}', [DiscountController::class, 'edit'])->name('admin.discount.edit');
        Route::post('/edit/{id}', [DiscountController::class, 'doEdit'])->name('admin.discount.doEdit');
        Route::get('/delete/{id}', [DiscountController::class, 'delete'])->name('admin.discount.delete');
        Route::get('/search',[DiscountController::class,'search'])->name('admin.discount.search');

    });

    Route::prefix('/keyword')->group(function () {
        Route::get('/', [KeywordController::class, 'list'])->name('admin.keyword.list');
        Route::get('/add', [KeywordController::class, 'add'])->name('admin.keyword.add');
        Route::post('/do-add', [KeywordController::class, 'doAdd'])->name('admin.keyword.doAdd');
        Route::get('/edit/{id}', [KeywordController::class, 'edit'])->name('admin.keyword.edit');
        Route::post('/edit/{id}', [KeywordController::class, 'doEdit'])->name('admin.keyword.doEdit');
        Route::get('/delete/{id}', [KeywordController::class, 'delete'])->name('admin.keyword.delete');
        Route::get('/search',[KeywordController::class,'search'])->name('admin.keyword.search');

    });

    Route::prefix('/order')->group(function () {
        Route::get('/', [OrderController::class, 'list'])->name('admin.order.list');
        Route::get('/add', [OrderController::class, 'add'])->name('admin.order.add');
        Route::post('/do-add', [OrderController::class, 'doAdd'])->name('admin.order.doAdd');
        Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('admin.order.edit');
        Route::post('/edit/{id}', [OrderController::class, 'doEdit'])->name('admin.order.doEdit');
        Route::get('/delete/{id}', [OrderController::class, 'delete'])->name('admin.order.delete');
        Route::get('/search',[OrderController::class,'search'])->name('admin.order.search');

    });

});




