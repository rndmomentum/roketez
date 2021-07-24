<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StripeApi extends Model
{
    protected $table = 'stripe_api';

    protected $fillable = [

        'public_api_key',
        'secret_api_key'

    ];
}
