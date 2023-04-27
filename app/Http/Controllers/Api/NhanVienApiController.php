<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseCRUDApiController;
use App\Models\DbModels\NhanvienModel;
use App\Models\Tables\TableNhanvien;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NhanVienApiController extends BaseCRUDApiController
{
    protected $model = NhanvienModel::class;

    protected function on_save_validation(Request $request, $object = NULL): \Illuminate\Contracts\Validation\Validator|bool
    {
        $rules = [
            TableNhanvien::COL_TEN_NV => 'required|string',
            TableNhanvien::COL_SDT_NV => 'required|string',
            TableNhanvien::COL_DIACHI_NV => 'required|string',
            TableNhanvien::COL_NGAYSINH => 'required|date_format:Y-m-d',
            TableNhanvien::COL_TEN_CH => 'required|string',
        ];
        $messages = [
            TableNhanvien::COL_TEN_NV.\request() => 'Vui lòng nhập tên nhân viên',
            TableNhanvien::COL_SDT_NV.\request() => 'Vui lòng nhập số điện thoại',
            TableNhanvien::COL_DIACHI_NV.\request() => 'Vui lòng nhập địa chỉ nhân viên',
            TableNhanvien::COL_NGAYSINH.\request() => 'Vui lòng nhập ngày sinh đúng định dạng ngày-tháng-năm',
            TableNhanvien::COL_TEN_CH.\request() => 'Vui lòng nhập tên cửa hàng nhân viên làm việc',
        ];
        return Validator::make($request->all(), $rules, $messages);
    }
}

