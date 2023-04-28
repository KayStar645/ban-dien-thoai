<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseCRUDApiController;
use App\Models\DbModels\KhachhangModel;
use App\Models\Tables\TableKhachhang;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;

class KhachHangApiController extends BaseCRUDApiController
{
    protected $model = KhachhangModel::class;

    public function __construct()
    {
        parent::__construct();
        $this->model = new $this->model;
    }

    public function index(Request $request): JsonResponse
    {
        try {
            $data = $this->model->with(['phieuXuats', 'phieuXuats.chiTietPhieuXuats', 'phieuXuats.chiTietPhieuXuats.sanPham']);

            if($request->has('filter') && !empty($request->get('filter'))) {
                $filters = json_decode($request->get('filter'), true);
                foreach ($filters as $column => $value) {
                    $data->where($column, 'like', '%' . $value . '%');
                }
            }

            if($request->has('sort') && !empty($request->get('sort'))) {
                $sorts = json_decode($request->get('sort'), true);
                foreach ($sorts as $column => $direction) {
                    $data->orderBy($column, $direction);
                }
            }

            $perPage = $request->has('perPage') ? intval($request->get('perPage')) : 10;
            $result = $data->paginate($perPage);

            return response()->json($result, 206);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function show(Request $request, $id): JsonResponse
    {
        try {
          $model = $this->model::with(['phieuXuats'])
              ->where($this->model->getKeyName(), $id)
              ->first();
          return response()->json(['data' => $model, 200]);
        } catch (ModelNotFoundException $e) {
            Log::error($e);
            return response()->json(['error' => 'Không tìm thấy bản ghi.'], 404);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['error' => $e->getMessage()], 500);
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

