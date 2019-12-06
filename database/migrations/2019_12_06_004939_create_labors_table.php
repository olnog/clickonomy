<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaborsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
	    $table->bigInteger('userID')->unsigned();
	    $table->integer('workers')->unsigned()->default(1);
	    $table->integer('farmers')->unsigned()->default(0);
	    $table->integer('lumberjacks')->unsigned()->default(0);
	    $table->integer('stonecutters')->unsigned()->default(0);
	    $table->integer('farmerOverseers')->unsigned()->default(0);
	    $table->integer('stonecutterOverseers')->unsigned()->default(0);
	    $table->integer('lumberjackOverseers')->unsigned()->default(0);
	    $table->integer('toolmakers')->unsigned()->default(0);
	    $table->integer('weaponsmakers')->unsigned()->default(0);
	    $table->integer('warriors')->unsigned()->default(0);
	    $table->smallInteger('newPopCent')->unsigned()->default();
	    $table->smallInteger('campfireFloorChance')->unsigned()->default(0);
	    $table->smallInteger('clickCounter')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('labors');
    }
}
