<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseCRUDApiController;
use App\Http\Controllers\Controller;
use App\Models\DbModels\SanphamModel;
use App\Models\Tables\TableAnhsanpham;
use App\Models\Tables\TableBinhluan;
use App\Models\Tables\TableDungluong;
use App\Models\Tables\TableKhachhang;
use App\Models\Tables\TableSanpham;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class SanPhamController extends BaseCRUDApiController
{
    protected $model = SanphamModel::class;

    public function __construct()
    {
        parent::__construct();
        $this->model = new SanphamModel();
    }

    public function getAll(Request $request): JsonResponse
    {
        try {
            $data = $this->model::with([
                'dungLuongs',
                'anhs',
                'thongTinSanPhams',
                'binhLuans' => function($binhLuan) {
                    $binhLuan->join(TableKhachhang::_tableName, TableKhachhang::_tableName . '.' . TableKhachhang::COL_ID_KH,
                        '=', TableBinhluan::_tableName . '.' . TableBinhluan::COL_ID_KH)
                        ->select(TableBinhluan::COL_ID_BL, TableBinhluan::COL_ID_SP,
                            TableKhachhang::_tableName . '.' . TableBinhluan::COL_ID_KH,
                            TableKhachhang::COL_TEN_KH, TableBinhluan::COL_NOIDUNG,
                            TableBinhluan::COL_NGAY_BL);
                },
                'thongTinSanPhams',
            ])->select(['ID_SP', 'Ten_SP', 'Gia_SP', 'SoLuong_SP'])->newQuery();

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

            //$result->dung_luongs->makeHidden(['ID_SP']);

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
