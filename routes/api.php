<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

/*
here is where you can register api routes for your application.
These routes are loaded by the RouteServiceProvider within a group which
is assigned the "api" middleware group. Enjoy building your api!
*/

// Route::resource('products', ProductController::class);

//public routes

    Route::get('/products', [ProductController::class, 'index']);

    Route::get('/products/{id}', [ProductController::class, 'show']);

    Route::get('/products/search/{name}', [ProductController::class, 'search']);

    Route::post('/register', [AuthController::class, 'register']);

    Route::post('/login', [AuthController::class, 'login']);


// Route::middleware('auth:sanctum')->get('/user', function (Request $request){
//     return $request->user();
// });

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');



// protected routes
Route::group(['middleware'=>['auth:sanctum']], function(){

    Route::post('/products', [ProductController::class, 'store']);

    Route::put('/products/{id}', [ProductController::class, 'update']);

    Route::delete('/products/{id}', [ProductController::class, 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);


});
