<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Admin extends Model implements AuthenticatableContract
{
    use Authenticatable;
    
    protected $table = 'admins';

    protected $fillable = [

        'admin_id',
        'firstname',
        'lastname',
        'email',
        'password',
        'role'

    ];

}
