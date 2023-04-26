<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseCRUDApiController;
use App\Models\DbModels\KhachhangModel;
use App\Models\Tables\TableKhachhang;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;

class KhachHangApiController extends BaseCRUDApiController
{
    protected $model = KhachhangModel::class;

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
            TableKhachhang::COL_TEN_KH => 'required|string',
            TableKhachhang::COL_SDT_KH => 'required|string',
            TableKhachhang::COL_DIACHI_KH => 'required|string',
            TableKhachhang::COL_EMAIL => 'required|email',
            TableKhachhang::COL_GIOITINH_KH => ['required', 'string', Rule::in(['Nam', 'Nữ'])],
        ];
        $messages = [
            TableKhachhang::COL_TEN_KH.\request() => 'Vui lòng nhập họ và tên',
            TableKhachhang::COL_SDT_KH.\request() => 'Vui lòng nhập số điện thoại',
            TableKhachhang::COL_DIACHI_KH.\request() => 'Vui lòng nhập địa chỉ giao hàng',
            TableKhachhang::COL_EMAIL.\request() => 'Vui lòng nhập địa chỉ email đúng định dạng',
            TableKhachhang::COL_GIOITINH_KH.\request() => 'Vui lòng nhập giới tính Nam hoặc Nữ',
        ];
        return Validator::make($request->all(), $rules, $messages);
    }

}

