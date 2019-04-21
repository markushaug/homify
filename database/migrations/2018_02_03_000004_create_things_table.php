<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('things', function (Blueprint $table) {
            $table->increments('id');
            $table->string('thing');
            $table->string('thingType');
            $table->string('binding');
            $table->string('password')->nullable();
            $table->string('default_on')->nullable();
            $table->string('default_off')->nullable();
            $table->string('protocol')->nullable();
            $table->string('ip')->nullable();
            $table->string('state')->nullable();
            $table->integer('room_id')->unsigned();
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
