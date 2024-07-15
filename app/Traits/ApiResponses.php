<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponses
{
    public function error($message, $statusCode): \Illuminate\Http\JsonResponse
    {
        return response()->json([
           'message' => $message,
        ], $statusCode);
    }

    public function success($message, $data = null, $statusCode = Response::HTTP_OK): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
        ], $statusCode);
    }

}
