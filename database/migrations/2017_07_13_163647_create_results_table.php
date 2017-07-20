<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('position');
            $table->timestamp('time')->nullable();
            $table->integer('finish_status');
            $table->integer('team_id');
            $table->integer('season_id');
            $table->integer('round_id');
            $table->float('points')->nullable();
            $table->timestamps();

            $table->unique(['team_id', 'season_id', 'round_id']);
            //$table->foreign('team_id')->references('id')->on('drivers');
            //$table->foreign('season_id')->references('id')->on('seasons');
            //$table->foreign('round_id')->references('id')->on('rounds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
