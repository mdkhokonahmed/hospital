<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dname');
            $table->string('email');
            $table->integer('deprtId');
            $table->string('designation');
            $table->text('address');
            $table->integer('mobile');
            $table->text('shortbiography');
            $table->text('image');
            $table->string('specialist');
            $table->string('batdate');
            $table->tinyInteger('sex');
            $table->integer('bloodId');
            $table->text('degree');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('doctors');
    }
}
