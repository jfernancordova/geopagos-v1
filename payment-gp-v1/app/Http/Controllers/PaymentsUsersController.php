<?php

namespace App\Http\Controllers;

use App\Entities\PaymentUser;
use App\Entities\User;
use App\Http\Requests\PaymentsUsers\StoreRequest;

class PaymentsUsersController extends ApiController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->ApiResponse(1,PaymentUser::all());
    }

    /**
     * @param $userCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($userCode)
    {
        $user = User::findOrFail($userCode);
        return $this->ApiResponse(1,['user' => $user->payments]);
    }

    /**
     * @param StoreRequest $request
     * @return mixed
     */
    public function store(StoreRequest $request)
    {
        $resource_data = $request->onlyWith([
            'user_code', 'payment_code'
        ]);

        return $this->validationForUsers($resource_data['user_code'],
            new PaymentUser(), $resource_data);

    }

    /**
     * @param $userCode
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($userCode)
    {
        $user = User::find($userCode);
        $user->destroy();

        return $this->ApiResponse(1, null);
    }
}
