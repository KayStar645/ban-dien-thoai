<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseCRUDApiController;
use App\Models\DbModels\KhachhangModel;
use App\Models\Tables\TableKhachhang;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;

class KhachHangApiController extends BaseCRUDApiController
{
    protected $model = KhachhangModel::class;

    protected function on_save_validation(Request $request, $object = NULL): \Illuminate\Contracts\Validation\Validator|bool
    {
        $rules = [
            TableKhachhang::COL_TEN_KH => 'required|string',
            TableKhachhang::COL_SDT_KH => 'required|string',
            TableKhachhang::COL_DIACHI_KH => 'required|string',
            TableKhachhang::COL_EMAIL => 'required|email',
            TableKhachhang::COL_GIOITINH_KH => ['required', 'string', Rule::in(['Nam', 'Nữ'])],
        ];
        $messages = [
            TableKhachhang::COL_TEN_KH.\request() => 'Vui lòng nhập họ và tên',
            TableKhachhang::COL_SDT_KH.\request() => 'Vui lòng nhập số điện thoại',
            TableKhachhang::COL_DIACHI_KH.\request() => 'Vui lòng nhập địa chỉ giao hàng',
            TableKhachhang::COL_EMAIL.\request() => 'Vui lòng nhập địa chỉ email đúng định dạng',
            TableKhachhang::COL_GIOITINH_KH.\request() => 'Vui lòng nhập giới tính Nam hoặc Nữ',
        ];
        return Validator::make($request->all(), $rules, $messages);
    }

}

