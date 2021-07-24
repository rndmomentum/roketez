<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketSupport extends Model
{
    protected $table = 'ticket_support';

    protected $fillable = [

        'ticket_support_id',
        'subject',
        'level',
        'status',
        'user_id'

    ];
}
