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
            $table->mediumInteger('number')->unsigned();
            $table->string('birth');
            $table->mediumInteger('CPF')->unsigned();
            $table->float('lesson_price')->unsigned();
            $table->float('rent_price')->nullable()->unsigned();
            $table->longText('description');
            $table->string('district');
            $table->string('zone');
            $table->string('instruments');
            $table->mediumText('certification');
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
