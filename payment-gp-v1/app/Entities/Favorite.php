<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'favorites';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_code', 'user_code_favorite'
    ];
}
