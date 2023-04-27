<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseCRUDApiController;
use App\Models\DbModels\SanphamModel;
use App\Models\Tables\TableAnhsanpham;
use App\Models\Tables\TableDungluong;
use App\Models\Tables\TableSanpham;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class SanPhamApiController extends BaseCRUDApiController
{
    protected $model = SanphamModel::class;

    public function __construct()
    {
        parent::__construct();
        $this->model = new SanphamModel();
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

    public function index(Request $request): JsonResponse
    {
        try {
            $data = $this->model::with(['dungLuongs', 'chiTietPhieuXuats'])->newQuery();


            // Check if filter exists
            if ($request->has('filter') && !empty($request->get('filter'))) {
                $filters = json_decode($request->get('filter'), true);
                foreach ($filters as $column => $value) {
                    // Check if column belongs to product_sizes table
                    if (strpos($column, TableDungluong::_tableName . '.') === 0) {
                        $data->where($column, 'like', '%' . $value . '%');
                    } else {
                        $data->where(TableSanpham::_tableName . '.' . $column,
                            'like', '%' . $value . '%');
                    }
                }
            }

            // Check if sort exists
            if ($request->has('sort') && !empty($request->get('sort'))) {
                $sorts = json_decode($request->get('sort'), true);
                foreach ($sorts as $column => $direction) {
                    // Check if column belongs to product_sizes table
                    if (strpos($column, TableDungluong::_tableName . '.') === 0) {
                        $data->orderBy($column, $direction);
                    } else {
                        $data->orderBy(TableSanpham::_tableName . '.' . $column, $direction);
                    }
                }
            }

            $perPage = $request->has('perPage') ? intval($request->get('perPage')) : 10;
            $result = $data->paginate($perPage);

            return response()->json($result);
        } catch (\Exception $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->getMessage(),
            ], 500);
        }
    }



//    public function index2(Request $request): JsonResponse
//    {
//        try {
//            $data = $this->model->newQuery();
//
//            // Join product_sizes table
//            $data->join(TableDungluong::_tableName,
//                TableSanpham::_tableName . '.' . TableSanpham::COL_ID_SP, '=',
//                TableDungluong::_tableName . '.' . TableDungluong::COL_ID_SP);
//
//            // Check if filter exists
//            if ($request->has('filter') && !empty($request->get('filter'))) {
//                $filters = json_decode($request->get('filter'), true);
//                foreach ($filters as $column => $value) {
//                    // Check if column belongs to product_sizes table
//                    if (strpos($column, TableDungluong::_tableName . '.') === 0) {
//                        $data->where($column, 'like', '%' . $value . '%');
//                    } else {
//                        $data->where(TableSanpham::_tableName . '.' . $column,
//                            'like', '%' . $value . '%');
//                    }
//                }
//            }
//
//            // Check if sort exists
//            if ($request->has('sort') && !empty($request->get('sort'))) {
//                $sorts = json_decode($request->get('sort'), true);
//                foreach ($sorts as $column => $direction) {
//                    // Check if column belongs to product_sizes table
//                    if (strpos($column, TableDungluong::_tableName . '.') === 0) {
//                        $data->orderBy($column, $direction);
//                    } else {
//                        $data->orderBy(TableSanpham::_tableName . '.' . $column, $direction);
//                    }
//                }
//            }
//
//            $perPage = $request->has('perPage') ? intval($request->get('perPage')) : 10;
//            $result = $data->paginate($perPage);
//
//            // Group by ID_SP and Ten_SP
//            $grouped = $result->groupBy([TableSanpham::COL_ID_SP, TableSanpham::COL_TEN_SP]);
//
//            // Map the grouped results to a new array
//            $products = $grouped->map(function ($item, $key) {
//                $product = $item[0];
//                $sizes = $item->pluck(TableDungluong::COL_TEN_DL)->toArray();
//
//                $product[TableDungluong::_tableName] = $sizes;
//
//                return $product;
//            });
//
//            // Return the modified collection as JSON
//            return response()->json($products);
//        } catch (\Exception $ex) {
//            return response()->json([
//                'success' => false,
//                'message' => $ex->getMessage(),
//            ], 500);
//        }
//    }
//
//
//    public function index1(Request $request): JsonResponse
//    {
//        try {
//            $data = $this->model->newQuery();
//
//            // Join product_sizes table
//            $data->join(TableDungluong::_tableName,
//                TableSanpham::_tableName . '.' . TableSanpham::COL_ID_SP, '=',
//                TableDungluong::_tableName . '.' . TableDungluong::COL_ID_SP);
//
//            // Check if filter exists
//            if ($request->has('filter') && !empty($request->get('filter'))) {
//                $filters = json_decode($request->get('filter'), true);
//                foreach ($filters as $column => $value) {
//                    // Check if column belongs to product_sizes table
//                    if (strpos($column, TableDungluong::_tableName . '.') === 0) {
//                        $data->where($column, 'like', '%' . $value . '%');
//                    } else {
//                        $data->where(TableSanpham::_tableName . '.' . $column,
//                            'like', '%' . $value . '%');
//                    }
//                }
//            }
//
//            // Check if sort exists
//            if ($request->has('sort') && !empty($request->get('sort'))) {
//                $sorts = json_decode($request->get('sort'), true);
//                foreach ($sorts as $column => $direction) {
//                    // Check if column belongs to product_sizes table
//                    if (strpos($column, TableDungluong::_tableName . '.') === 0) {
//                        $data->orderBy($column, $direction);
//                    } else {
//                        $data->orderBy(TableSanpham::_tableName . '.' . $column, $direction);
//                    }
//                }
//            }
//
//            $perPage = $request->has('perPage') ? intval($request->get('perPage')) : 10;
//            $result = $data->paginate($perPage);
//
//            return response()->json($result);
//        } catch (\Exception $ex) {;
//            return response()->json([
//                'success' => false,
//                'message' => $ex->getMessage(),
//            ], 500);
//        }
//    }

}
