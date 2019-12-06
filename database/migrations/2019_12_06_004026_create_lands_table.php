<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
	    $table->bigInteger('userID')->unsigned()->nullable();
	    $table->smallInteger('terrain')->unsigned();
	    $table->integer('x')->unsigned();
	    $table->integer('y')->unsigned();
	    $table->bigInteger('security')->unsigned()->default(0);
	    $table->boolean('home')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lands');
    }
}
