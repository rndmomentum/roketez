<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memberships extends Model
{
    
    protected $table = 'memberships';

    protected $fillable = [

        'membership_id',
        'title',
        'description',
        'original_price',
        'sales_price',
        'status',
        'trial_day'

    ];

}
