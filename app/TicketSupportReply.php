<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketSupportReply extends Model
{
    
    protected $table = 'ticket_support_reply';

    protected $fillable = [

        'ticket_support_id',
        'sender_answer',
        'sender_name',
    ];

}
