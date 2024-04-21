<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Relations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //  This is Realations for the coupon_datas Table ..
        Schema::table('coupon_datas', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('student_datas');
           
        });
         //  This is Realations for the preferred_durations Table ..
         Schema::table('preferred_durations', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('student_datas');
            $table->foreign('duration_id')->references('id')->on('durations');

        });
         //  This is Realations for the students_courses Table ..
         Schema::table('students_courses', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('student_datas');
            $table->foreign('course_id')->references('id')->on('courses');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
