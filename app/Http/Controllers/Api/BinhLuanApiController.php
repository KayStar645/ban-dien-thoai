<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseCRUDApiController;
use App\Http\Controllers\Controller;
use App\Models\DbModels\BinhluanModel;
use App\Models\Tables\TableBinhluan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BinhLuanApiController extends BaseCRUDApiController
{
    protected $model = BinhluanModel::class;

    public function index(Request $request): JsonResponse
    {
        try {
            return parent::index($request);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ], 500);
        }
    }

    public function show(Request $request, $id): JsonResponse
    {
        try {

            return parent::show($request, $id);
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            return parent::store($request);
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }

    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        try {
            return parent::update($request, $id);
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }

    public function destroy(Request $request, $id): JsonResponse
    {
        try {
            return parent::destroy($request, $id);
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }

    protected function on_save_validation(Request $request, $object = NULL): \Illuminate\Contracts\Validation\Validator|bool
    {
        $rules = [
            TableBinhluan::COL_MA_SP => 'required|string',
            TableBinhluan::COL_MA_KH => 'required|string',
            TableBinhluan::COL_NOIDUNG => 'required|string',
            TableBinhluan::COL_NGAY_BL => 'required|string',
        ];
        $messages = [
            TableBinhluan::COL_MA_SP.\request() => 'Vui lòng chọn mã sản phẩm',
            TableBinhluan::COL_MA_KH.\request() => 'Vui lòng chọn mã khách hàng',
            TableBinhluan::COL_NOIDUNG.\request() => 'Vui lòng nhập nội dung bình luận',
            TableBinhluan::COL_NGAY_BL.\request() => 'Vui lòng nhập để thời gian bình luận',
        ];
        return Validator::make($request->all(), $rules, $messages);
    }
}
