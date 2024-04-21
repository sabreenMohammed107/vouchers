<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students_course extends Model
{
    protected $fillable = [
        'student_id', 'course_id',
    ];
}
