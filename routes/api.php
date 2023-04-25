<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SanPhamApiController;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

// Chưa phân quyền
//Route::resource('products', SanPhamApiController::class)->only(['index', 'show', 'store', 'update', 'destroy']);


//Route::group(['User' => 'api'], function () {
//    // Sản phẩm
//    Route::get('/products', [SanPhamApiController::class, 'index']); // /api/products
//    Route::get('/products/{id}', [SanPhamApiController::class, 'show']); // /api/products/SP0001
//    Route::post('/products', [SanPhamApiController::class, 'store']); // /api/products
//    Route::put('/products/{id}', [SanPhamApiController::class, 'update']); // /api/products/SP0001
//    Route::delete('/products/{id}', [SanPhamApiController::class, 'destroy']); // /api/products/SP0001
//});

Route::group(['middleware' => 'user:api'], function () {
    Route::resource('products', SanPhamApiController::class)->only(['index', 'show']);
});


Route::group(['middleware' => 'admin:api'], function () {
    Route::resource('products', SanPhamApiController::class);
});

