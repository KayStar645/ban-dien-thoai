<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseCRUDApiController;
use App\Http\Controllers\Controller;
use App\Models\DbModels\DungluongModel;
use App\Models\Tables\TableDungluong;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DungLuongApiController extends BaseCRUDApiController
{
    protected $model = DungluongModel::class;

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
            TableDungluong::COL_TEN_DL => 'required|string',
            TableDungluong::COL_MA_SP => 'required|string',
        ];
        $messages = [
            TableDungluong::COL_TEN_DL.\request() => 'Vui lòng nhập dung lượng',
            TableDungluong::COL_MA_SP.\request() => 'Vui lòng chọn nhập mã sản phẩm',
        ];
        return Validator::make($request->all(), $rules, $messages);
    }
}

