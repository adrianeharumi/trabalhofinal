<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('time_student')->nullable();
            $table->mediumText('question')->nullable();
            $table->mediumText('answer')->nullable();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->string('student_name')->nullable();
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->dateTime('time_teacher')->nullable();
            $table->string('teacher_name')->nullable();
            $table->timestamps();
        });
        Schema::table('commentaries', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('students')->onDelete('set null');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commentaries');
    }
}
