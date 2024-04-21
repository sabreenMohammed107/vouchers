<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preferred_duration extends Model
{
    protected $fillable = [
        'student_id', 'duration_id',
    ];
}
