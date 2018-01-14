<?php
namespace App\Helpers;

use App\Entities\User;
use Carbon\Carbon;

/**
 * Class ApiHelpers
 * @package App\Helpers
 */
class ApiHelpers {

    /**
     * Generic API response structure for all requests
     *
     * @param $code string
     * @param $response mixed
     * @return \Illuminate\Http\JsonResponse
     */
    public static function ApiResponse($code, $response)
    {
        return response()->json([
            'code'     => $code,
            'message'  => trans('api_codes.' . $code),
            'response' => $response
        ]);
    }
}