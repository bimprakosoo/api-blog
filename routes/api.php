<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\TagsController;
use App\Http\Controllers\API\PostController;
use Illuminate\Support\Facades\Route;

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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
  Route::get('user', [AuthController::class, 'getUser']);
  Route::post('logout', [AuthController::class, 'logout']);
  
  //Route for category
  Route::post('category/add', [CategoryController::class, 'store']);
  Route::get('category/{id?}', [CategoryController::class, 'show']);
  Route::put('category/edit/{id}', [CategoryController::class, 'edit']);
  Route::delete('category/delete/{id}', [CategoryController::class, 'delete']);
  
  //Route for tag
  Route::post('tag/add', [TagsController::class, 'store']);
  Route::get('tag/{id?}', [TagsController::class, 'show']);
  Route::put('tag/edit/{id}', [TagsController::class, 'edit']);
  Route::delete('tag/delete/{id}', [TagsController::class, 'delete']);
  
  //Route for post
  Route::post('post/add', [PostController::class, 'store']);
  Route::get('post/{id?}', [PostController::class, 'show']);
  Route::put('post/edit/{id}', [PostController::class, 'edit']);
  Route::delete('post/delete/{id}', [PostController::class, 'delete']);
  Route::post('post/comment', [PostController::class, 'comment']);
});
