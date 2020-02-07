<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->mediumInteger('number')->unsigned()->nullable();
            $table->string('birth')->nullable();
            $table->mediumInteger('CPF')->nullable()->unsigned();
            $table->float('lesson_price')->nullable()->unsigned();
            $table->float('rent_price')->nullable()->unsigned();
            $table->longText('description')->nullable();
            $table->string('district')->nullable();
            $table->string('zone')->nullable();
            $table->string('instruments')->nullable();
            $table->mediumText('certification')->nullable();
            $table->string('photo')->nullable();
            $table->string('video')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('teachers');
    }
}
