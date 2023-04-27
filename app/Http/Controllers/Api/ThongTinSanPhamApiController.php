<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseCRUDApiController;
use App\Models\DbModels\ThongtinsanphamModel;
use App\Models\Tables\TableThongtinsanpham;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ThongTinSanPhamApiController extends BaseCRUDApiController
{
    protected $model = ThongtinsanphamModel::class;

    protected function on_save_validation(Request $request, $object = NULL): \Illuminate\Contracts\Validation\Validator|bool
    {
        $rules = [
            TableThongtinsanpham::COL_ID_SP => 'required|integer',
            TableThongtinsanpham::COL_THONGTIN => 'required|string',
            TableThongtinsanpham::COL_MOTA_SP => 'required|string',
        ];
        $messages = [
            TableThongtinsanpham::COL_ID_SP.\request() => 'Vui lòng nhập mã thông tin',
            TableThongtinsanpham::COL_THONGTIN.\request() => 'Vui lòng nhập thông tin',
            TableThongtinsanpham::COL_MOTA_SP.\request() => 'Vui lòng nhập mô tả',
        ];
        return Validator::make($request->all(), $rules, $messages);
    }
}

