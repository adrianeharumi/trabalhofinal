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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->bigIncrements('id');
            $table->float('lesson_price')->nullable()->unsigned();
            $table->float('rent_price')->nullable()->unsigned();
            $table->longText('description')->nullable();
            $table->string('district')->nullable();
            $table->string('zone')->nullable();
            $table->string('instruments');
            $table->string('video')->nullable();
            $table->mediumText('certification');
            $table->string('owner_name')->nullable();
            $table->string('bank')->nullable();
            $table->string('agency')->nullable();
            $table->string('account')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('teachers', function (Blueprint $table) {
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
        Schema::dropIfExists('teachers');
    }
}
