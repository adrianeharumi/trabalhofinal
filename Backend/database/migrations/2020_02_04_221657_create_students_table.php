<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->bigIncrements('id');
            $table->string('number_credit_card')->nullable();
            $table->integer('cvv')->nullable();
            $table->string('name_owner')->nullable();
            $table->string('due_date')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('students', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
