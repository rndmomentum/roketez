<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    
    protected $table = 'subscriptions';

    protected $fillable = [

        'subscription_id',
        'membership_id',
        'stripe_id',
        'user_id',
        'price',
        
    ];

}
