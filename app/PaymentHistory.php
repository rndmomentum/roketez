<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    
    protected $table = 'payment_history';

    protected $fillable = [

        'order_id',
        'stripe_id',
        'user_id',
        'membership_id',
        'invoice_id',
        'price',
        'status'
    ];

}
