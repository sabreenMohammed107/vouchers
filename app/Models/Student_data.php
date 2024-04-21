<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student_data extends Model
{
    protected $fillable = [
        'name', 'mobile', 'city','education','job','note' ,'id_number'
    ];

    public function course()
    {
        return $this->belongsToMany('App\Course', 'students_courses', 'student_id', 'course_id');
    }
    public function duration()
    {
        return $this->belongsToMany('App\Duration', 'preferred_durations', 'student_id', 'duration_id');
    }
}
