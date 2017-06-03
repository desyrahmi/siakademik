<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!(Schema::hasTable('rooms'))){
            Schema::create('rooms', function(Blueprint $table){
                $table->increments('id');
                $table->string('code');
                $table->integer('subject_id')->unsigned();
                $table->foreign('subject_id')->references('id')->on('subjects');
                $table->integer('lecturer_id')->unsigned();
                $table->foreign('lecturer_id')->references('id')->on('users');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rooms');
    }
}
