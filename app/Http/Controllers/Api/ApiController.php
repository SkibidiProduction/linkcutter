<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    public function success($data = [], int $status = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'status' => $status,
            'data' => $data
        ], $status);
    }
}
