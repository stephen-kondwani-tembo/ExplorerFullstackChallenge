<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_tutors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned()->index();
            $table->bigInteger('tutor_id')->unsigned()->index();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('tutor_id')->references('id')->on('tutors')->onDelete('cascade');
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
        Schema::dropIfExists('student_tutors');
    }
}
