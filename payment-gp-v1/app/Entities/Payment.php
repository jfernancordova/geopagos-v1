<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'payments';

    protected $primaryKey = 'payment_code';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_code', 'imported', 'date'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'payments_users', 'user_code', 'payment_code');
    }
}
