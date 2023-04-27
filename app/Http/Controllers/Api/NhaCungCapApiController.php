<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseCRUDApiController;
use App\Http\Controllers\Controller;
use App\Models\DbModels\NhacungcapModel;
use App\Models\Tables\TableNhacungcap;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NhaCungCapApiController extends BaseCRUDApiController
{
    protected $model = NhacungcapModel::class;

    protected function on_save_validation(Request $request, $object = NULL)
    {
        $rules = [
            TableNhacungcap::COL_TEN_NCC => 'required|string',
            TableNhacungcap::COL_SDT_NCC => 'required|string',
            TableNhacungcap::COL_DIACHI_NCC => 'required|string',
        ];
        $messages = [
            TableNhacungcap::COL_TEN_NCC.\request() => 'Vui lòng nhập tên nhà cung cấp',
            TableNhacungcap::COL_SDT_NCC.\request() => 'Vui lòng nhập số điện thoại nhà cung cấp',
            TableNhacungcap::COL_DIACHI_NCC.\request() => 'Vui lòng nhập điaạ chỉ nhà cung cấp',
        ];
        return Validator::make($request->all(), $rules, $messages);
    }
}

