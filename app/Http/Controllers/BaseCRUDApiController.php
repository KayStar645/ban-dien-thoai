<?php

namespace App\Http\Controllers;

use App\Models\Tables\TableSanpham;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Exception;


abstract class BaseCRUDApiController extends ApiController
{
    protected $model;

    public function __construct()
    {
        $this->load_model();
    }

    public function load_model()
    {
        $this->model = (new $this->model);
    }

    public function index(Request $request): JsonResponse
    {
        try {
            $models = $this->model::all();
            return response()->json(['data' => $models], 200);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['error' => 'Không thể tìm nạp bản ghi.'], 500);
        }
    }

//    public function index(Request $request): JsonResponse
//    {
//        try {
//            $query = $this->model->newQuery();
//            $products = $this->getModel()::newQuery()->get();
//
//            // Check if filter exists
//            if ($request->has('filter') && !empty($request->get('filter'))) {
//                $filters = json_decode($request->get('filter'), true);
//                foreach ($filters as $column => $value) {
//                    $query->where($column, 'like', '%' . $value . '%');
//                }
//            }
//
//            // Check if sort exists
//            if ($request->has('sort') && !empty($request->get('sort'))) {
//                $sorts = json_decode($request->get('sort'), true);
//                foreach ($sorts as $column => $direction) {
//                    $query->orderBy($column, $direction);
//                }
//            }
//
//            $perPage = $request->has('perPage') ? intval($request->get('perPage')) : 10;
//            $result = $query->paginate($perPage);
//
//            return response()->json($result);
//        } catch (\Exception $ex) {
//            return response()->json(['error' => $ex->getMessage()], 500);
//        }
//    }

    public function show(Request $request, $id): JsonResponse
    {
        try {
            $model = $this->model::findOrFail($id);
            return response()->json(['data' => $model], 200);
        } catch (ModelNotFoundException $e) {
            Log::error($e);
            return response()->json(['error' => 'Không tìm thấy bản ghi.'], 404);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['error' => 'Không thể tìm nạp bản ghi.'], 500);
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

//            $id = $model->getAttribute($this->model->primaryKey); // Lấy ID của object vừa tạo
//            $a = $model->primaryKey;

            return response()->json(['data' => $model], 201);
        } catch (ValidationException $e) {
            Log::error($e);
            return response()->json(['error' => $e->validator->errors()], 422);
        } catch (\Exception $e) {

            Log::error($e);
            return response()->json(['error' => 'Không thể tạo bản ghi.'], 500);
        }
    }

    public function update(Request $request, $id): JsonResponse
    {
        try {
            $model = $this->model::findOrFail($id);

            $validator = $this->on_save_validation($request, $model);
            if ($validator === FALSE)
            {
                throw new Exception('Đầu vào không hợp lệ!');
            }
            if ($validator->fails())
            {
                throw new ValidationException($validator);
            }
            $data = $validator->validated();

            $model->update($data);
            return response()->json(['data' => $model], 200);
        } catch (ModelNotFoundException $e) {
            Log::error($e);
            return response()->json(['error' => 'Record not found.'], 404);
        } catch (ValidationException $e) {
            Log::error($e);
            return response()->json(['error' => $e->validator->errors()], 422);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['error' => 'Unable to update record.'], 500);
        }
    }

    public function destroy(Request $request, $id): JsonResponse
    {
        try {
            $model = $this->model::findOrFail($id);
            $model->delete();
            return response()->json(null, 204);
        } catch (ModelNotFoundException $e) {
            Log::error($e);
            return response()->json(['error' => 'Không tìm thấy bản ghi.'], 404);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['error' => 'Không thể xóa bản ghi.'], 500);
        }
    }

    /**
     * @param Request $request
     * @param string $id
     * @return \Illuminate\Contracts\Validation\Validator | bool
     */
    protected function on_save_validation(Request $request, $object = NULL)
    {
        $rules = [];
        $messages = [];
        return Validator::make($request->all(), $rules, $messages);
    }
}
