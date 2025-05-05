<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',250)->nullable();
            $table->string('id_number',250)->nullable();
            $table->string('mobile',250)->nullable();
            $table->string('city',250)->nullable();
            $table->string('education',250)->nullable();
            $table->string('job',250)->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('student_datas');
    }
}
