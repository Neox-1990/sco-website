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
            $table->integer('laps');
            $table->integer('incs');
            $table->integer('finish_status');
            $table->integer('team_id');
            $table->integer('season_id');
            $table->integer('round_id');
            $table->float('points');
            $table->timestamps();

            $table->unique(['team_id', 'season_id', 'round_id']);
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
