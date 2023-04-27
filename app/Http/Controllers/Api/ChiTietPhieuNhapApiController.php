<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseCRUDApiController;
use App\Http\Controllers\Controller;
use App\Models\DbModels\ChitietphieunhapModel;
use App\Models\Tables\TableChitietphieunhap;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChiTietPhieuNhapApiController extends BaseCRUDApiController
{
    protected $model = ChitietphieunhapModel::class;

    protected function on_save_validation(Request $request, $object = NULL): \Illuminate\Contracts\Validation\Validator|bool
    {
        $rules = [
            TableChitietphieunhap::COL_ID_PN => 'required|integer',
            TableChitietphieunhap::COL_ID_SP => 'required|integer',
            TableChitietphieunhap::COL_SOLUONGNHAP => 'required|integer|min:0',
            TableChitietphieunhap::COL_GIANHAP => 'required|integer|min:0',
        ];
        $messages = [
            TableChitietphieunhap::COL_ID_PN.\request() => 'Vui lòng chọn mã phiếu nhập',
            TableChitietphieunhap::COL_ID_SP.\request() => 'Vui lòng chọn mã sản phẩm',
            TableChitietphieunhap::COL_SOLUONGNHAP.\request() => 'Vui lòng nhập số lượng nhập',
            TableChitietphieunhap::COL_GIANHAP.\request() => 'Vui lòng nhập giá nhập',
        ];
        return Validator::make($request->all(), $rules, $messages);
    }
}
