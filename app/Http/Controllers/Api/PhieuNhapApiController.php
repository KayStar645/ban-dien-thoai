<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseCRUDApiController;
use App\Models\DbModels\PhieunhapModel;
use App\Models\Tables\TablePhieunhap;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Exception;

class PhieuNhapApiController extends BaseCRUDApiController
{
    protected $model = PhieunhapModel::class;

    public function __construct()
    {
        parent::__construct();
        $this->model = (new $this->model);
    }

    public function index(Request $request): JsonResponse
    {
        try {
            $data = $this->model->with(['nhaCungCap', 'nhanVien', 'chiTietPhieuNhaps', 'chiTietPhieuNhaps.sanPham']);

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
            $model = $this->model::with(['nhaCungCap', 'nhanVien', 'chiTietPhieuNhaps', 'chiTietPhieuNhaps.sanPham'])
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

    public function store(Request $request): JsonResponse
    {
        try {
            $validator = $this->on_save_validation($request);
            if ($validator === FALSE)
            {
                throw new Exception('invalid input');
            }
            if ($validator->fails())
            {
                throw new ValidationException($validator);
            }
            $data = $validator->validated();

            $model = $this->model::create($data);

            return response()->json(['data' => $model], 201);

        } catch (ValidationException $e) {
            Log::error($e);
            return response()->json(['error' => $e->validator->getMessageBag()], 422);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['error' => $e->getMessage()], 500);
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

