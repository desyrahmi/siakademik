<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!(Schema::hasTable('participants'))){
            Schema::create('participants', function(Blueprint $table){
                $table->increments('id');
                $table->integer('room_id')->unsigned()->nullable();
                $table->foreign('room_id')->references('id')->on('rooms');
                $table->integer('student_id')->unsigned()->nullable();
                $table->foreign('student_id')->references('id')->on('users');
                $table->string('mid_exam_result')->nullable();
                $table->string('final_exam_result')->nullable();
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
        Schema::drop('participants');
    }
}
