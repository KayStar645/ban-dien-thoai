<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseCRUDApiController;
use App\Http\Controllers\Controller;
use App\Models\DbModels\DungluongModel;
use App\Models\Tables\TableDungluong;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DungLuongApiController extends BaseCRUDApiController
{
    protected $model = DungluongModel::class;

    protected function on_save_validation(Request $request, $object = NULL): \Illuminate\Contracts\Validation\Validator|bool
    {
        $rules = [
            TableDungluong::COL_TEN_DL => 'required|string',
            TableDungluong::COL_ID_SP => 'required|integer',
        ];
        $messages = [
            TableDungluong::COL_TEN_DL.\request() => 'Vui lòng nhập dung lượng',
            TableDungluong::COL_ID_SP.\request() => 'Vui lòng chọn nhập mã sản phẩm',
        ];
        return Validator::make($request->all(), $rules, $messages);
    }
}

