<?php

namespace App\Http\Requests\Payments;

use App\Http\Requests\ApiRequest;

class StoreRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [

            'imported'   => 'required|numeric|min:1|unique:payments',
            'date'       => 'required|after_or_equal:' . date("Y-m-d"),
            'user_code'  => 'required|numeric'

        ];

        return $rules;
    }
}