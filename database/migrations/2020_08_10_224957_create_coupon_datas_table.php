<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('coupon_code',100)->nullable();
            $table->integer('discount_per')->nullable();
            $table->dateTime('assign_date',6)->nullable();
            $table->dateTime('expired_date',6)->nullable();
            $table->integer('student_id')->unsigned()->nullable();
            $table->integer('coupon_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupon_datas');
    }
}
