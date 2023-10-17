<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('home_team');
            $table->string('away_team');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('overs')->nullable();
            $table->string('overs_per_bowler')->nullable();
            $table->string('ground')->nullable();
            $table->string('win_team')->nullable();
            $table->string('home_captain')->nullable();
            $table->string('away_captain')->nullable();
            $table->string('power_play')->nullable();
            $table->string('keeper')->nullable();
            $table->string('twelveth_man')->nullable();
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
        Schema::dropIfExists('matches');
    }
}
