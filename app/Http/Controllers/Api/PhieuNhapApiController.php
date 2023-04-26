<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseCRUDApiController;
use App\Models\DbModels\PhieunhapModel;
use App\Models\Tables\TablePhieunhap;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PhieuNhapApiController extends BaseCRUDApiController
{
    protected $model = PhieunhapModel::class;

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
            TablePhieunhap::COL_ID_NCC => 'required|integer',
            TablePhieunhap::COL_ID_NV => 'required|integer',
            TablePhieunhap::COL_NGAYNHAP => 'required|date_format:Y-m-d H:i:s',
            TablePhieunhap::COL_TONGTIEN_PN => 'required|integer|min:0',
        ];
        $messages = [
            TablePhieunhap::COL_ID_NCC.\request() => 'Vui lòng chọn nhà cung cấp',
            TablePhieunhap::COL_ID_NV.\request() => 'Vui lòng chọn nhân viên nhập',
            TablePhieunhap::COL_NGAYNHAP.\request() => 'Vui lòng nhập đúng định dạng ngày:tháng:năm giờ:phút:giây',
            TablePhieunhap::COL_TONGTIEN_PN.\request() => 'Vui lòng nhập tiền là số nguyên và tối thiểu là 0',
        ];
        return Validator::make($request->all(), $rules, $messages);
    }
}

