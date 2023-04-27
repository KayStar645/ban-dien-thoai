<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseCRUDApiController;
use App\Http\Controllers\Controller;
use App\Models\DbModels\DanhmucsanphamModel;
use App\Models\Tables\TableDanhmucsanpham;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DanhMucSanPhamApiController extends BaseCRUDApiController
{
    protected $model = DanhmucsanphamModel::class;

    protected function on_save_validation(Request $request, $object = NULL): \Illuminate\Contracts\Validation\Validator|bool
    {
        $rules = [
            TableDanhmucsanpham::COL_TEN_DM => 'required|string',
        ];
        $messages = [
            TableDanhmucsanpham::COL_TEN_DM.\request() => 'Vui lòng nhập tên danh mục sản phẩm',
        ];
        return Validator::make($request->all(), $rules, $messages);
    }
}

