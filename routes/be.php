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
use App\Http\Controllers\Admin\UserAddressController;
use App\Http\Controllers\Admin\StatementController;

Route::prefix('/admin')->group(function () {

    Route::prefix('/category')->group(function () {
        Route::get('/', [CategoryController::class, 'list'])->name('admin.category.list');
        Route::get('/add', [CategoryController::class, 'add'])->name('admin.category.add');
        Route::post('/add', [CategoryController::class, 'doAdd'])->name('admin.category.doAdd');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('/edit/{id}', [CategoryController::class, 'doEdit'])->name('admin.category.doEdit');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
        Route::get('/search',[CategoryController::class,'search'])->name('admin.category.search');
        Route::get('/filter',[CategoryController::class,'filter'])->name('admin.category.filter');
    });

    Route::prefix('/product')->group(function (){
        Route::get('/', [ProductController::class, 'list'])->name('admin.product.list');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('/edit/{id}', [ProductController::class, 'doEdit'])->name('admin.product.doEdit');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');
        Route::get('/search',[ProductController::class,'search'])->name('admin.product.search');
        Route::get('/filter',[ProductController::class,'filter'])->name('admin.product.filter');
    });

    Route::prefix('/user')->group(function () {
        Route::get('/',[UserController::class,'List'])->name('admin.user.list');
        Route::get('/add', [UserController::class, 'add'])->name('admin.user.add');
        Route::post('/do-add', [UserController::class, 'doAdd'])->name('admin.user.doAdd');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/edit/{id}', [UserController::class, 'doEdit'])->name('admin.user.doEdit');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
        Route::get('/search',[UserController::class,'search'])->name('admin.user.search');
        Route::get('/filter',[UserController::class,'filter'])->name('admin.user.filter');

    });


    Route::prefix('/discount')->group(function () {
        Route::get('/', [DiscountController::class, 'list'])->name('admin.discount.list');
        Route::get('/add', [DiscountController::class, 'add'])->name('admin.discount.add');
        Route::post('/do-add', [DiscountController::class, 'doAdd'])->name('admin.discount.doAdd');
        Route::get('/edit/{id}', [DiscountController::class, 'edit'])->name('admin.discount.edit');
        Route::post('/edit/{id}', [DiscountController::class, 'doEdit'])->name('admin.discount.doEdit');
        Route::get('/delete/{id}', [DiscountController::class, 'delete'])->name('admin.discount.delete');
        Route::get('/search',[DiscountController::class,'search'])->name('admin.discount.search');
        Route::get('/filter',[DiscountController::class,'filter'])->name('admin.discount.filter');

    });

    Route::prefix('/keyword')->group(function () {
        Route::get('/', [KeywordController::class, 'list'])->name('admin.keyword.list');
        Route::get('/add', [KeywordController::class, 'add'])->name('admin.keyword.add');
        Route::post('/do-add', [KeywordController::class, 'doAdd'])->name('admin.keyword.doAdd');
        Route::get('/edit/{id}', [KeywordController::class, 'edit'])->name('admin.keyword.edit');
        Route::post('/edit/{id}', [KeywordController::class, 'doEdit'])->name('admin.keyword.doEdit');
        Route::get('/delete/{id}', [KeywordController::class, 'delete'])->name('admin.keyword.delete');
        Route::get('/search',[KeywordController::class,'search'])->name('admin.keyword.search');
        Route::get('/filter',[KeywordController::class,'filter'])->name('admin.keyword.filter');

    });

    Route::prefix('/order')->group(function () {
        Route::get('/', [OrderController::class, 'list'])->name('admin.order.list');
        Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('admin.order.edit');
        Route::post('/edit/{id}', [OrderController::class, 'doEdit'])->name('admin.order.doEdit');
        Route::get('/delete/{id}', [OrderController::class, 'delete'])->name('admin.order.delete');
        Route::get('/search',[OrderController::class,'search'])->name('admin.order.search');
        Route::get('/filter',[OrderController::class,'filter'])->name('admin.order.filter');

    });

    Route::prefix('/user_address')->group(function () {
        Route::get('/', [UserAddressController::class, 'list'])->name('admin.user_address.list');
        Route::get('/add', [UserAddressController::class, 'add'])->name('admin.user_address.add');
        Route::post('/do-add', [UserAddressController::class, 'doAdd'])->name('admin.user_address.doAdd');
        Route::get('/edit/{id}', [UserAddressController::class, 'edit'])->name('admin.user_address.edit');
        Route::post('/edit/{id}', [UserAddressController::class, 'doEdit'])->name('admin.user_address.doEdit');
        Route::get('/delete/{id}', [UserAddressController::class, 'delete'])->name('admin.user_address.delete');
        Route::get('/search',[UserAddressController::class,'search'])->name('admin.user_address.search');
        Route::get('filter',[UserAddressController::class,'filter'])->name('admin.user_address.filter');

    });

    Route::prefix('/statement')->group(function () {
        Route::get('/', [StatementController::class, 'list'])->name('admin.statement.list');
        Route::get('/add', [StatementController::class, 'add'])->name('admin.statement.add');
        Route::post('/do-add', [StatementController::class, 'doAdd'])->name('admin.statement.doAdd');
        Route::get('/edit/{id}', [StatementController::class, 'edit'])->name('admin.statement.edit');
        Route::post('/edit/{id}', [StatementController::class, 'doEdit'])->name('admin.statement.doEdit');
        Route::get('/delete/{id}', [StatementController::class, 'delete'])->name('admin.statement.delete');
        Route::get('/search',[StatementController::class,'search'])->name('admin.statement.search');
        Route::get('filter',[StatementController::class,'filter'])->name('admin.statement.filter');

    });

});




