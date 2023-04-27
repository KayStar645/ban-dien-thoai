<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseCRUDApiController;
use App\Models\DbModels\SanphamModel;
use App\Models\Tables\TableSanpham;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class SanPhamApiController extends BaseCRUDApiController
{
    protected $model = SanphamModel::class;

    protected function on_save_validation(Request $request, $object = NULL): \Illuminate\Contracts\Validation\Validator|bool
    {
        $rules = [
            TableSanpham::COL_ID_DMSP => 'required|integer',
            TableSanpham::COL_TEN_SP => 'required|string',
            TableSanpham::COL_GIA_SP => 'required|integer|min:0',
            TableSanpham::COL_SOLUONG_SP => 'required|integer|min:0',
        ];
        $messages = [
            TableSanpham::COL_ID_DMSP.\request() => 'Vui lòng chọn danh mục',
            TableSanpham::COL_TEN_SP.\request() => 'Vui lòng nhập tên sản phẩm',
            TableSanpham::COL_GIA_SP.\request() => 'Vui lòng nhập giá sản phẩm',
            TableSanpham::COL_SOLUONG_SP.\request() => 'Vui lòng nhập số lượng sản phẩm',
        ];
        return Validator::make($request->all(), $rules, $messages);
    }
}
