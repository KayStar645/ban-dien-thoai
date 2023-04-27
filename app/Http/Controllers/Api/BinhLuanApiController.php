<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseCRUDApiController;
use App\Http\Controllers\Controller;
use App\Models\DbModels\BinhluanModel;
use App\Models\Tables\TableBinhluan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BinhLuanApiController extends BaseCRUDApiController
{
    protected $model = BinhluanModel::class;

    protected function on_save_validation(Request $request, $object = NULL): \Illuminate\Contracts\Validation\Validator|bool
    {
        $rules = [
            TableBinhluan::COL_ID_SP => 'required|integer',
            TableBinhluan::COL_ID_KH => 'required|integer',
            TableBinhluan::COL_NOIDUNG => 'required|string',
            TableBinhluan::COL_NGAY_BL => 'required|string',
        ];
        $messages = [
            TableBinhluan::COL_ID_SP.\request() => 'Vui lòng chọn mã sản phẩm',
            TableBinhluan::COL_ID_KH.\request() => 'Vui lòng chọn mã khách hàng',
            TableBinhluan::COL_NOIDUNG.\request() => 'Vui lòng nhập nội dung bình luận',
            TableBinhluan::COL_NGAY_BL.\request() => 'Vui lòng nhập để thời gian bình luận',
        ];
        return Validator::make($request->all(), $rules, $messages);
    }
}
