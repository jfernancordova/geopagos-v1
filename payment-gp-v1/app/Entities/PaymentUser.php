<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class PaymentUser extends Model
{

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'payments_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_code', 'user_code'
    ];

}
