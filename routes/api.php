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

/*
 * api/products?sort={"Gia_SP":"asc"}&filter={"Ten_SP":"S"}&perPage=5&page=2
 * Ví dụ API lấy danh sách sản phẩm được lấy theo giá tăng dần, trong Ten_SP có chứa "S",
 * được chia làm 5 trang và vào trang thứ 2!
 * */

// Chưa xác thực người dùng
Route::group(['middleware' => 'user:api'], function () {
    Route::resource('san-pham', SanPhamApiController::class)->only(['index', 'show']);
    Route::resource('hinh-anh', AnhSanPhamApiController::class)->only(['index', 'show']);
    Route::resource('binh-luan', BinhLuanApiController::class)->only(['index', 'show']);
    Route::resource('chi-tiet-phieu-nhap', ChiTietPhieuNhapApiController::class)->only(['index', 'show']);
    Route::resource('chi-tiet-phieu-xuat', ChiTietPhieuXuatApiController::class)->only(['index', 'show']);
    Route::resource('cua-hang', CuaHangApiController::class)->only(['index', 'show']);
    Route::resource('danh-muc-san-pham', DanhMucSanPhamApiController::class)->only(['index', 'show']);
    Route::resource('dung-luong', DungLuongApiController::class)->only(['index', 'show']);
    Route::resource('khach-hang', KhachHangApiController::class)->only(['index', 'show']);
    Route::resource('mau-sac', MauSacApiController::class)->only(['index', 'show']);
    Route::resource('nha-cung-cap', NhaCungCapApiController::class)->only(['index', 'show']);
    Route::resource('nhan-vien', NhanVienApiController::class)->only(['index', 'show']);
    Route::resource('phieu-nhap', PhieuNhapApiController::class)->only(['index', 'show']);
    Route::resource('phieu-xuat', PhieuXuatApiController::class)->only(['index', 'show']);
    Route::resource('thong-tin-san-pham', ThongTinSanPhamApiController::class)->only(['index', 'show']);
});

// Chưa xác thực người dùng
Route::group(['middleware' => 'admin:api'], function () {
    Route::resource('san-pham', SanPhamApiController::class)->middleware('admin');
    Route::resource('hinh-anh', AnhSanPhamApiController::class);
    Route::resource('binh-luan', AnhSanPhamApiController::class);
    Route::resource('chi-tiet-phieu-nhap', ChiTietPhieuNhapApiController::class);
    Route::resource('chi-tiet-phieu-xuat', ChiTietPhieuXuatApiController::class);
    Route::resource('cua-hang', CuaHangApiController::class);
    Route::resource('danh-muc-san-pham', DanhMucSanPhamApiController::class);
    Route::resource('dung-luong', DungLuongApiController::class);
    Route::resource('khach-hang', KhachHangApiController::class);
    Route::resource('mau-sac', MauSacApiController::class);
    Route::resource('nha-cung-cap', NhaCungCapApiController::class);
    Route::resource('nhan-vien', NhanVienApiController::class);
    Route::resource('phieu-nhap', PhieuNhapApiController::class);
    Route::resource('phieu-xuat', PhieuXuatApiController::class);
    Route::resource('thong-tin-san-pham', ThongTinSanPhamApiController::class);
});

