<?php

namespace App\Http\Requests\Users;

use App\Entities\User;
use App\Http\Requests\ApiRequest;
use Illuminate\Support\Facades\Auth;

class DestroyRequest extends ApiRequest
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
        return [
            //
        ];
    }
}
