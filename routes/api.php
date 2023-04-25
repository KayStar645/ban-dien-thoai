<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SanPhamApiController;
use App\Http\Controllers\Api\AnhSanPhamApiController;
use App\Http\Controllers\Api\BinhLuanApiController;
use App\Http\Controllers\Api\ChiTietPhieuNhapApiController;
use App\Http\Controllers\Api\ChiTietPhieuXuatApiController;
use App\Http\Controllers\Api\CuaHangApiController;
use App\Http\Controllers\Api\DanhMucSanPhamApiController;
use App\Http\Controllers\Api\DungLuongApiController;
use App\Http\Controllers\Api\KhachHangApiController;
use App\Http\Controllers\Api\MauSacApiController;
use App\Http\Controllers\Api\NhaCungCapApiController;
use App\Http\Controllers\Api\NhanVienApiController;
use App\Http\Controllers\Api\PhieuNhapApiController;
use App\Http\Controllers\Api\PhieuXuatApiController;
use App\Http\Controllers\Api\ThongTinSanPhamApiController;

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


//Route::resource('products', SanPhamApiController::class)->only(['index', 'show', 'store', 'update', 'destroy']);


//Route::group(['User' => 'api'], function () {
//    // Sản phẩm
//    Route::get('/products', [SanPhamApiController::class, 'index']); // /api/products
//    Route::get('/products/{id}', [SanPhamApiController::class, 'show']); // /api/products/SP0001
//    Route::post('/products', [SanPhamApiController::class, 'store']); // /api/products
//    Route::put('/products/{id}', [SanPhamApiController::class, 'update']); // /api/products/SP0001
//    Route::delete('/products/{id}', [SanPhamApiController::class, 'destroy']); // /api/products/SP0001
//});

// Chưa xác thực người dùng
Route::group(['middleware' => 'user:api'], function () {
    Route::resource('products', SanPhamApiController::class)->only(['index', 'show']);
    Route::resource('images', AnhSanPhamApiController::class)->only(['index', 'show']);
    Route::resource('comments', BinhLuanApiController::class)->only(['index', 'show']);
    Route::resource('receipt_details', ChiTietPhieuNhapApiController::class)->only(['index', 'show']);
    Route::resource('export_details', ChiTietPhieuXuatApiController::class)->only(['index', 'show']);
    Route::resource('shops', CuaHangApiController::class)->only(['index', 'show']);
    Route::resource('product_portfolios', DanhMucSanPhamApiController::class)->only(['index', 'show']);
    Route::resource('capacitys', DungLuongApiController::class)->only(['index', 'show']);
    Route::resource('customers', KhachHangApiController::class)->only(['index', 'show']);
    Route::resource('colors', MauSacApiController::class)->only(['index', 'show']);
    Route::resource('suppliers', NhaCungCapApiController::class)->only(['index', 'show']);
    Route::resource('staffs', NhanVienApiController::class)->only(['index', 'show']);
    Route::resource('receipts', PhieuNhapApiController::class)->only(['index', 'show']);
    Route::resource('exports', PhieuXuatApiController::class)->only(['index', 'show']);
    Route::resource('product_infos', ThongTinSanPhamApiController::class)->only(['index', 'show']);
});

// Chưa xác thực người dùng
Route::group(['middleware' => 'admin:api'], function () {
    Route::resource('products', SanPhamApiController::class);
    Route::resource('images', AnhSanPhamApiController::class);
    Route::resource('comments', AnhSanPhamApiController::class);
    Route::resource('receipt_details', ChiTietPhieuNhapApiController::class);
    Route::resource('export_details', ChiTietPhieuXuatApiController::class);
    Route::resource('shops', CuaHangApiController::class);
    Route::resource('product_portfolios', DanhMucSanPhamApiController::class);
    Route::resource('capacitys', DungLuongApiController::class);
    Route::resource('customers', KhachHangApiController::class); // Thêm khách hàng lỗi
    Route::resource('colors', MauSacApiController::class);
    Route::resource('suppliers', NhaCungCapApiController::class);
    Route::resource('staffs', NhanVienApiController::class);
    Route::resource('receipts', PhieuNhapApiController::class);
    Route::resource('exports', PhieuXuatApiController::class);
    Route::resource('product_infos', ThongTinSanPhamApiController::class);
});

