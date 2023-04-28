<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseCRUDApiController;
use App\Models\DbModels\SanphamModel;
use App\Models\Tables\TableAnhsanpham;
use App\Models\Tables\TableDungluong;
use App\Models\Tables\TableSanpham;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class SanPhamApiController extends BaseCRUDApiController
{
    protected $model = SanphamModel::class;

    public function __construct()
    {
        parent::__construct();
        $this->model = (new $this->model);
    }

    public function index(Request $request, $id=null): JsonResponse
    {
        try {
            $data = $this->model::with('anhs', 'mauSacs', 'dungLuongs', 'binhLuans',
                'binhLuans.khachHang', 'thongTinSanPhams');

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
            $model = $this->model::with(['anhs', 'mauSacs', 'dungLuongs', 'binhLuans', 'binhLuans.khachHang', 'thongTinSanPhams'])
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


    protected function on_save_validation(Request $request, $object = NULL)
    {
        $rules = [
            TableSanpham::COL_ID_DMSP => 'required|integer',
            TableSanpham::COL_TEN_SP => 'required|string',
            TableSanpham::COL_GIA_SP => 'required|integer|min:0',
            TableSanpham::COL_SOLUONG_SP => 'required|integer|min:0',
        ];
        $messages = [
            TableSanpham::COL_ID_DMSP.\request() => 'Vui lòng chọn danh mục',
            TableSanpham::COL_TEN_SP.\request() => 'Vui lòng nhập tên sản phẩm',
            TableSanpham::COL_GIA_SP.\request() => 'Vui lòng nhập giá sản phẩm',
            TableSanpham::COL_SOLUONG_SP.\request() => 'Vui lòng nhập số lượng sản phẩm',
        ];
        return Validator::make($request->all(), $rules, $messages);
    }
}
