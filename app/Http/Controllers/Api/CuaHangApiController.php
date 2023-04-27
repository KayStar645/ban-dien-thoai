<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseCRUDApiController;
use App\Http\Controllers\Controller;
use App\Models\DbModels\CuahangModel;
use App\Models\Tables\TableCuahang;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CuaHangApiController extends BaseCRUDApiController
{
    protected $model = CuahangModel::class;

    protected function on_save_validation(Request $request, $object = NULL): \Illuminate\Contracts\Validation\Validator|bool
    {
        $rules = [
            TableCuahang::COL_TEN_CH => 'required|string',
            TableCuahang::COL_TAIKHOAN => 'required|string',
            TableCuahang::COL_MATKHAU => 'required|min:6', //'required|min:6|regex:/^(?=.*[A-Z])(?=.*\d).+$/',
            TableCuahang::COL_DIACHI_CH => 'string',
            TableCuahang::COL_SDT_CH => 'required|string',
        ];
        $messages = [
            TableCuahang::COL_TEN_CH.\request() => 'Vui lòng nhập tên cửa hàng',
            TableCuahang::COL_TAIKHOAN.\request() => 'Vui lòng nhập tài khoản',
            TableCuahang::COL_MATKHAU.\request() => 'Vui lòng nhập mật khẩu',
            TableCuahang::COL_SDT_CH.\request() => 'Vui lòng nhập số điện thoại',
        ];
        return Validator::make($request->all(), $rules, $messages);
    }
}

