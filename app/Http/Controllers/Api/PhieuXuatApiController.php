<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseCRUDApiController;
use App\Http\Controllers\Controller;
use App\Models\DbModels\PhieuxuatModel;
use App\Models\Tables\TablePhieuxuat;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PhieuXuatApiController extends BaseCRUDApiController
{
    protected $model = PhieuxuatModel::class;

    public function __construct()
    {
        parent::__construct();
        $this->model = new $this->model;
    }

    public function index(Request $request): JsonResponse
    {
        try {
            $data = $this->model->with(['khachHang', 'nhanVien', 'chiTietPhieuXuats', 'chiTietPhieuXuats.sanPham']);

            // Check if filter exists
            if ($request->has('filter') && !empty($request->get('filter'))) {
                $filters = json_decode($request->get('filter'), true);
                foreach ($filters as $column => $value) {
                    $data->where($column, 'like', '%' . $value . '%');
                }
            }

            // Check if sort exists
            if ($request->has('sort') && !empty($request->get('sort'))) {
                $sorts = json_decode($request->get('sort'), true);
                foreach ($sorts as $column => $direction) {
                    $data->orderBy($column, $direction);
                }
            }

            $perPage = $request->has('perPage') ? intval($request->get('perPage')) : 10;
            $result = $data->paginate($perPage);

            return response()->json($result, 206);
        } catch (\Exception $ex) {;
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage(),
            ], 500);
        }
    }

    public function show(Request $request, $id): JsonResponse
    {
        try {
            $model = $this->model::with(['khachHang', 'nhanVien', 'chiTietPhieuXuats', 'chiTietPhieuXuats.sanPham'])
                ->where($this->model->getKeyName(), $id)
                ->first();

            return response()->json(['data' => $model], 200);
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
            TablePhieuxuat::COL_ID_NV => 'required|integer',
            TablePhieuxuat::COL_ID_KH => 'required|integer',
            TablePhieuxuat::COL_NGAYDATHANG => 'required|date_format:Y-m-d H:i:s',
            TablePhieuxuat::COL_TONGTIEN_PX => 'required|integer|min:0',
            TablePhieuxuat::COL_TINHTRANG_PX => 'required|integer',
        ];
        $messages = [
            TablePhieuxuat::COL_ID_NV.\request() => 'Vui lòng chọn nhân viên nhập',
            TablePhieuxuat::COL_ID_KH.\request() => 'Vui lòng chọn khách hàng',
            TablePhieuxuat::COL_NGAYDATHANG.\request() => 'Vui lòng nhập đúng định dạng ngày:tháng:năm giờ:phút:giây',
            TablePhieuxuat::COL_TONGTIEN_PX.\request() => 'Vui lòng nhập tiền là số nguyên và tối thiểu là 0',
            TablePhieuxuat::COL_TINHTRANG_PX.\request() => 'tình trạng không được để trống',
        ];
        return Validator::make($request->all(), $rules, $messages);
    }
}

