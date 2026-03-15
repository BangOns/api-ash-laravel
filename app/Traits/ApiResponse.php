<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public function successResponse(
        mixed $data = null,
        string $message = 'Success',
        int $code = 200,
        array $meta = []
    ): JsonResponse {
        return response()->json([
            'status' => true,
            'data' => $data,
            'message' => $message,
            'meta' => $meta
        ], $code);
    }

    public function errorResponse(
        string $message = 'Error',
        int $code = 400
    ): JsonResponse {
        return response()->json([
            'status' => false,
            'message' => $message
        ], $code);
    }
}
