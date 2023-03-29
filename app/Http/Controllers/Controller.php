<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public int $perPageDefault = 8;

    public function CustomError(string $message, int $code = 404, string $field = 'common'): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'success' => false,
            'errors' => [
                [
                    'field' => $field,
                    'message' => $message
                ]
            ]
        ], $code);
    }

    public function CustomErrorArray(array $errors, int $code = 404): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'success' => false,
            'errors' => $errors
        ], $code);
    }

    public function CustomSuccess($message = 'ok', int $code = 200): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message
        ], $code);
    }
}
