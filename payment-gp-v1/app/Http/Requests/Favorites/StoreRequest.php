<?php

namespace App\Http\Requests\Favorites;

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

            'user_code'           => 'required|numeric',
            'user_code_favorite'  => 'required|numeric|unique:favorites',

        ];

        return $rules;
    }
}