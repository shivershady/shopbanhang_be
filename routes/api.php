<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;

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
Route::post('/product/add',[ProductController::class,'add']);

// api users
Route::middleware('auth:api')->post('/user/update',[UserController::class,'update']);
Route::middleware('auth:api')->post('/user/update-shop',[UserController::class,'updateShop']);

//đăng nhập, đăng ký, profile
Route::post('user/register',[AuthController::class,'register']);
Route::post('user/login',[AuthController::class,'login'])->name('user.login');
Route::middleware('auth:api')->get('user/logout',[AuthController::class,'logout']);
Route::middleware('auth:api')->post('user/change-password',[AuthController::class,'changePassword']);
Route::middleware('auth:api')->get('/user',[AuthController::class,'list']);

// api trang home
Route::get('/home/category',[CategoryController::class,'list']);
Route::get('/home/product',[ProductController::class,'list']);
