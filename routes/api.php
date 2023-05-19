<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
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
   
   //Route for category
  Route::post('category/add', [CategoryController::class, 'store']);
  Route::get('category/{id?}', [CategoryController::class, 'show']);
  Route::put('category/edit/{id}', [CategoryController::class, 'edit']);
  Route::delete('category/delete/{id}', [CategoryController::class, 'delete']);
});
