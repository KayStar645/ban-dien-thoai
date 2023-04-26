<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseCRUDApiController;
use App\Http\Controllers\Controller;
use App\Models\DbModels\ChitietphieunhapModel;
use App\Models\Tables\TableChitietphieunhap;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChiTietPhieuNhapApiController extends BaseCRUDApiController
{
    protected $model = ChitietphieunhapModel::class;

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
            TableChitietphieunhap::COL_ID_PN => 'required|integer',
            TableChitietphieunhap::COL_ID_SP => 'required|integer',
            TableChitietphieunhap::COL_SOLUONGNHAP => 'required|integer|min:0',
            TableChitietphieunhap::COL_GIANHAP => 'required|integer|min:0',
        ];
        $messages = [
            TableChitietphieunhap::COL_ID_PN.\request() => 'Vui lòng chọn mã phiếu nhập',
            TableChitietphieunhap::COL_ID_SP.\request() => 'Vui lòng chọn mã sản phẩm',
            TableChitietphieunhap::COL_SOLUONGNHAP.\request() => 'Vui lòng nhập số lượng nhập',
            TableChitietphieunhap::COL_GIANHAP.\request() => 'Vui lòng nhập giá nhập',
        ];
        return Validator::make($request->all(), $rules, $messages);
    }
}
