<?php

namespace App\Http\Controllers;

use App\Entities\Registration;
use App\Entities\User;
use App\Functions\Functions;
use App\Helpers\ApiHelpers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Carbon\Carbon;

class ApiController extends Controller implements Functions
{

    /**
     * Wrapper for the ApiResponse Helper
     *
     * @param string $code
     * @param array $response
     * @return \Illuminate\Http\JsonResponse
     */
    protected function ApiResponse($code, $response)
    {
        return ApiHelpers::ApiResponse($code, $response);
    }

    /**
     * @param null $value
     * @param Model $resource
     * @param array $array
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function validationForUsers($value = null, Model $resource, $array = ['*'])
    {
        if($this->ifExists($value))
        {
            $resource->fill($array);
            $resource->save();

            return $this->ApiResponse(1,null);
        }
        return $this->ApiResponse(2,['User does not exist']);
    }

    /**
     * @param $value
     * @return mixed
     */
    public function ifExists($value)
    {
       return User::findOrFail($value)->count();
    }

    /**
     * @param $table
     * @param $current
     * @param $value
     * @return mixed|void
     */
    public function updateWithQuery($table, $current, $value)
    {
        \DB::table($table)
            ->where('user_code', $current)
            ->update(['payment_code' => $value]);
    }

}