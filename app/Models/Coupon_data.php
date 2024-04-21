<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon_data extends Model
{
    use HasFactory;
    protected $fillable = [
        'coupon_code', 'discount_per', 'expired_date','coupon_status','student_id','assign_date','adminNotes'
    ];
    public function student()
    {
        return $this->belongsTo('App\Models\Student_data','student_id');

    }
}
