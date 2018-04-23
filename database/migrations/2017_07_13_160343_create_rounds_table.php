<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rounds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number');
            $table->integer('season_id');
            $table->string('combo');
            $table->dateTime('fp1_start')->nullable();
            $table->integer('fp1_minutes')->nullable();
            $table->dateTime('fp2_start')->nullable();
            $table->integer('fp2_minutes')->nullable();
            $table->dateTime('warmup_start')->nullable();
            $table->integer('warmup_minutes')->nullable();
            $table->dateTime('qual_start')->nullable();
            $table->integer('qual_minutes')->nullable();
            $table->dateTime('race_start')->nullable();
            $table->integer('race_minutes')->nullable();
            $table->integer('race_laps')->nullable();
            $table->timestamps();

            $table->unique(['number', 'season_id']);
            //$table->foreign('season_id')->references('id')->on('seasons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rounds');
    }
}
