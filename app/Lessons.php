<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    
    protected $table = 'lessons';

    protected $fillable = [

        'lesson_id',
        'title',
        'course_id',
        'link_video',
        'duration',
        'creator_id'

    ];

}
