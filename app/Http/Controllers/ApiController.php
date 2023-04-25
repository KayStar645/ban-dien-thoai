<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;


class ApiController extends Controller {
    # --------------------------------------------------------------------
    # region Helper functions
    # --------------------------------------------------------------------
    protected int $statusCode = 200;

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode): static
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function respondNotFound($message = 'Not found'): JsonResponse
    {
        return $this->setStatusCode(ResponseAlias::HTTP_NOT_FOUND)->respondWithError($message);
    }

    public function respondInternalError($message = 'Internal Error'): JsonResponse
    {
        return $this->setStatusCode(ResponseAlias::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
    }

    public function respondWithError($message): JsonResponse
    {
        $data = [
            'message' => $message,
            'success' => FALSE
        ];
        return $this->setStatusCode(ResponseAlias::HTTP_BAD_REQUEST)->respond($data);
    }

    public function respond($data, $headers = []): JsonResponse
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

    public function respondSuccess($data, $meta = NULL): JsonResponse
    {
        $res = [
            'data' => $data,
        ];
        if ($meta !== NULL)
        {
            $res['meta'] = $meta;
        }
        $res['message'] = 'Success';
        $res['success'] = TRUE;
        return $this->setStatusCode(ResponseAlias::HTTP_OK)->respond($res);
    }

    public function respondDeleted(): JsonResponse
    {
        return $this->setStatusCode(ResponseAlias::HTTP_NO_CONTENT)->respond([]);
    }

    /**
     * @param Validator $validator
     * @return JsonResponse
     */
    public function respondWithValidationError(Validator $validator): JsonResponse
    {
        $errors = $validator->errors();

        return $this->respondWithError($errors->first());
    }

    # endregion

}
