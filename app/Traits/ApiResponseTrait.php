<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{
    protected function apiResponse(mixed $status, string $message, mixed $result = null, int $statusCode = 200): JsonResponse
    {
        $data = [
            'status' => $status,
            'message' => $message,
        ];

        if (!is_null($result)) {
            $data['result'] = $result;
        }

        return response()->json(
            $data,
            $statusCode
        );
    }
}
