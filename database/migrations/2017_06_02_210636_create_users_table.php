<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        if(!(Schema::hasTable('users'))){
            Schema::create('users', function(Blueprint $table){
                $table->increments('id');
                $table->string('username')->unique();
                $table->string('name');
                $table->string('password');
                $table->integer('guardian_id')->unsigned()->nullable();
                $table->foreign('guardian_id')->references('id')->on('users');
                $table->string('role');
                $table->rememberToken();
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::drop('users');
    }
}
