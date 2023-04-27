<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseCRUDApiController;
use App\Http\Controllers\Controller;
use App\Models\DbModels\AnhsanphamModel;
use App\Models\Tables\TableAnhsanpham;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnhSanPhamApiController extends BaseCRUDApiController
{
    protected $model = AnhsanphamModel::class;

    protected function on_save_validation(Request $request, $object = NULL): \Illuminate\Contracts\Validation\Validator|bool
    {
        $rules = [
            TableAnhsanpham::COL_ANH_URL => 'required|string'
        ];
        $messages = [
            TableAnhsanpham::COL_ANH_URL.\request() => 'Vui lòng chọn hình ảnh',
        ];
        return Validator::make($request->all(), $rules, $messages);
    }
}
