<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterThingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('things', function (Blueprint $table) {
            $table->integer('room_id')->unsigned();
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
        $table->foreign('room_id')
                        ->references('id')->on('rooms')
                        ->onDelete('cascade');
    }
}
