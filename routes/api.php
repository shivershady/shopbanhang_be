<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
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

//category

//đăng nhập, đăng ký, profile
Route::post('user/register',[UserController::class,'register']);
Route::post('user/login',[UserController::class,'login'])->name('user.login');
Route::middleware('auth:api')->get('user/logout',[UserController::class,'logout']);
Route::middleware('auth:api')->post('user/change-password',[UserController::class,'changePassword']);
Route::middleware('auth:api')->get('/user',[UserController::class,'list']);

// api trang home
Route::get('/home/category',[CategoryController::class,'list']);
Route::get('/home/product',[ProductController::class,'list']);
