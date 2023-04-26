<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseCRUDApiController;
use App\Http\Controllers\Controller;
use App\Models\DbModels\ChitietphieuxuatModel;
use App\Models\Tables\TableChitietphieuxuat;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChiTietPhieuXuatApiController extends BaseCRUDApiController
{
    protected $model = ChitietphieuxuatModel::class;

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
            TableChitietphieuxuat::COL_ID_PX => 'required|integer',
            TableChitietphieuxuat::COL_ID_SP => 'required|integer',
            TableChitietphieuxuat::COL_SOLUONGXUAT => 'required|integer|min:0',
        ];
        $messages = [
            TableChitietphieuxuat::COL_ID_PX.\request() => 'Vui lòng chọn mã phiếu xuất',
            TableChitietphieuxuat::COL_ID_SP.\request() => 'Vui lòng chọn mã sản phẩm',
            TableChitietphieuxuat::COL_SOLUONGXUAT.\request() => 'Vui lòng nhập số lượng xuất',
        ];
        return Validator::make($request->all(), $rules, $messages);
    }
}
