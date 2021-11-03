<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



// product
Route::middleware('auth:api')->post('/product/add',[ProductController::class,'add']);
Route::get('/product',[ProductController::class,'list']);
Route::get('/product-details/{id}',[ProductController::class,'productDetails']);

//cart
Route::middleware('auth:api')->post('/cart/add/{id}',[CartController::class,'addToCart']);
Route::middleware('auth:api')->post('/cart/delete/{id}',[CartController::class,'delete']);
Route::get('/cart',[CartController::class,'list']);

//orsers
Route::middleware('auth:api')->post('/orders/add/{id}',[OrderController::class,'add']);

// api users
Route::middleware('auth:api')->post('/user/update-profile',[UserController::class,'update']);
Route::middleware('auth:api')->post('/user/update-shop',[UserController::class,'updateShop']);
//đăng nhập, đăng ký, profile
Route::post('user/register',[AuthController::class,'register']);
Route::post('user/login',[AuthController::class,'login'])->name('user.login');
Route::middleware('auth:api')->get('user/logout',[AuthController::class,'logout']);
Route::middleware('auth:api')->post('user/change-password',[AuthController::class,'changePassword']);
Route::middleware('auth:api')->get('/user',[AuthController::class,'list']);

Route::get('/category',[CategoryController::class,'list']);

