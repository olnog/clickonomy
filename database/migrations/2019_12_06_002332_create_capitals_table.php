<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capitals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
	    $table->bigInteger('userID');
	    $table->bigInteger('foodLimit')->default(10)->unsigned();
	    $table->bigInteger('clicks')->default(0)->unsigned();
	    $table->bigInteger('food')->default(0)->unsigned();
	    $table->bigInteger('stone')->default(0)->unsigned();
	    $table->bigInteger('stoneHoes')->default(0)->unsigned();
	    $table->bigInteger('stoneAxes')->default(0)->unsigned();
	    $table->bigInteger('stonePickaxes')->default(0)->unsigned();
	    $table->bigInteger('stoneSpears')->default(0)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('capitals');
    }
}
