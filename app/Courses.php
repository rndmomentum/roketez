<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    
    protected $table = 'courses';

    protected $fillable = [

        'course_id',
        'title',
        'description',
        'image',
        'creator_id',
        'category',
        'level',
        'locked'

    ];

}
