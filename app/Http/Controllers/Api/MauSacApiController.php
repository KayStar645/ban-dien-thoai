<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseCRUDApiController;
use App\Models\DbModels\MausacModel;
use App\Models\Tables\TableMausac;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MauSacApiController extends BaseCRUDApiController
{
    protected $model = MausacModel::class;

    protected function on_save_validation(Request $request, $object = NULL): \Illuminate\Contracts\Validation\Validator|bool
    {
        $rules = [
            TableMausac::COL_TENMAU => 'required|string',
            TableMausac::COL_ID_SP => 'required|integer',
        ];
        $messages = [
            TableMausac::COL_TENMAU.\request() => 'Vui lòng nhập tên màu sắc',
            TableMausac::COL_ID_SP.\request() => 'Vui lòng chọn mã sản phẩm',
        ];
        return Validator::make($request->all(), $rules, $messages);
    }
}

