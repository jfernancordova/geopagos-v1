<?php

namespace App\Http\Controllers;

use App\Entities\Payment;
use App\Entities\PaymentUser;
use App\Entities\User;
use App\Http\Requests\Payments\StoreRequest;

/**
 * Class PaymentsController
 * @package App\Http\Controllers
 */
class PaymentsController extends ApiController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return $this->ApiResponse(1,Payment::all());
    }

    /**
     * @param $payment
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($payment)
    {
        return $this->ApiResponse(1,Payment::findOrFail($payment));
    }

    /**
     * @param StoreRequest $request
     * @return mixed
     */
    public function store(StoreRequest $request)
    {
        $resource_data = $request->onlyWith([
            'imported', 'date', 'user_code'
        ]);

        if($this->ifExists($resource_data['user_code']))
        {
            $payment = new Payment();
            $payment->fill($resource_data);
            $payment->save();

            $this->updateWithQuery('payments_users', $resource_data['user_code'], $payment['payment_code']);
        }

        return $this->ApiResponse(1, null);

    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return $this->ApiResponse(1,null);
    }
}
