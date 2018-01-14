<?php

namespace App\Http\Requests\Users;

use App\Entities\User;
use App\Http\Requests\ApiRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRequest extends ApiRequest
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
            'user'          => 'required|unique:users',
            'password'      => 'sometimes|max:60|min:6',
            'age'           => 'required|numeric|min:18'
        ];
        return $rules;
    }



}
