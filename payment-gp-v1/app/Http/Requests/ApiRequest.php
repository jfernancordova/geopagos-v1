<?php

namespace App\Http\Requests;

use App\Entities\User;
use App\Helpers\ApiHelpers;
use App\Helpers\FieldsHelpers;
use Illuminate\Foundation\Http\FormRequest;
use Tymon\JWTAuth\Facades\JWTAuth;

abstract class ApiRequest extends FormRequest
{

    /**
     * Each resource request should define this property
     * @var $resource string
     */
    protected $resource;

    /**
     * This method is used for handling the parameters validation errors
     * @return \Illuminate\Http\JsonResponse
     */
    public function forbiddenResponse()
    {
        return ApiHelpers::ApiResponse(102, null);
    }

    /**
     * This method is used for handling the parameters validation errors
     * @param array $errors
     * @return \Illuminate\Http\JsonResponse
     */
    public function response(array $errors)
    {
        return ApiHelpers::ApiResponse(301, ['errors' => $errors]);
    }

    /**
     * Wrapper for the 'only' method, but excluding the null values
     * @param array $keys
     * @return array
     */
    public function onlyWith(array $keys)
    {
        $inputs = $this->only($keys);
        return $this->removeNullValues($inputs);
    }

    /**
     *
     * @param array $inputs
     * @return array
     */
    private function removeNullValues(array $inputs)
    {
        foreach ($inputs as $key => $value)
        {
            if (is_array($value))
            {
                $inputs[$key] = $this->removeNullValues($inputs[$key]);
            }

            if (empty($inputs[$key]) && !is_string($inputs[$key]))
            {
                unset($inputs[$key]);
            }
        }

        return $inputs;
    }


    /**
     * @param $resource_class
     * @param $record_id
     * @return mixed
     */
    protected function findRecordInRequest($resource_class, $record_id)
    {
        return call_user_func_array([$resource_class, "findOrFail"], [$record_id]);
    }

}