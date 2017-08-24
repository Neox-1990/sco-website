<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('season_id');
            $table->string('name');
            $table->integer('number');
            $table->integer('car');
            $table->integer('status');
            $table->integer('ir_teamid');
            $table->integer('preqtime')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['season_id', 'name', 'deleted_at']);
            //$table->foreign('manager_id')->references('id')->on('managers');
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
        Schema::dropIfExists('teams');
    }
}
