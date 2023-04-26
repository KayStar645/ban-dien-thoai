<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseCRUDApiController;
use App\Http\Controllers\Controller;
use App\Models\DbModels\NhacungcapModel;
use App\Models\Tables\TableNhacungcap;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NhaCungCapApiController extends BaseCRUDApiController
{
    protected $model = NhacungcapModel::class;

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
            TableNhacungcap::COL_TEN_NCC => 'required|string',
            TableNhacungcap::COL_SDT_NCC => 'required|string',
            TableNhacungcap::COL_DIACHI_NCC => 'required|string',
        ];
        $messages = [
            TableNhacungcap::COL_TEN_NCC.\request() => 'Vui lòng nhập tên nhà cung cấp',
            TableNhacungcap::COL_SDT_NCC.\request() => 'Vui lòng nhập số điện thoại nhà cung cấp',
            TableNhacungcap::COL_DIACHI_NCC.\request() => 'Vui lòng nhập điaạ chỉ nhà cung cấp',
        ];
        return Validator::make($request->all(), $rules, $messages);
    }
}

