<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseCRUDApiController;
use App\Http\Controllers\Controller;
use App\Models\DbModels\PhieuxuatModel;
use App\Models\Tables\TablePhieuxuat;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PhieuXuatApiController extends BaseCRUDApiController
{
    protected $model = PhieuxuatModel::class;

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
            TablePhieuxuat::COL_MA_PX => 'required|string',
            TablePhieuxuat::COL_ID_NV => 'required|integer',
            TablePhieuxuat::COL_MA_KH => 'required|string',
            TablePhieuxuat::COL_NGAYXUAT => 'required|date_format:Y-m-d H:i:s',
            TablePhieuxuat::COL_TONGTIEN_PX => 'required|integer|min:0',
            TablePhieuxuat::COL_TINHTRANG_PX => 'required|string',
        ];
        $messages = [
            TablePhieuxuat::COL_MA_PX.\request() => 'Vui lòng nhập mã phiếu xuất',
            TablePhieuxuat::COL_ID_NV.\request() => 'Vui lòng chọn nhân viên nhập',
            TablePhieuxuat::COL_MA_KH.\request() => 'Vui lòng chọn khách hàng',
            TablePhieuxuat::COL_NGAYXUAT.\request() => 'Vui lòng nhập đúng định dạng ngày:tháng:năm giờ:phút:giây',
            TablePhieuxuat::COL_TONGTIEN_PX.\request() => 'Vui lòng nhập tiền là số nguyên và tối thiểu là 0',
            TablePhieuxuat::COL_TINHTRANG_PX.\request() => 'tình trạng không được để trống',
        ];
        return Validator::make($request->all(), $rules, $messages);
    }
}

