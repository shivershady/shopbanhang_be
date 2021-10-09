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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// product
Route::get('/product',[ProductController::class,'list']);
Route::post('/product/add',[ProductController::class,'add']);

//category
Route::get('/category',[CategoryController::class,'list']);

//user
Route::post('user/register',[UserController::class,'register']);
Route::post('user/login',[UserController::class,'login'])->name('user.login');
Route::post('user/logout',[UserController::class,'logout']);
Route::post('user/changePassword',[UserController::class,'changePassword']);
