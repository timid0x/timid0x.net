<?php
###### Sat Jun 3 12:02:52 COT 2023

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained();
            $table->bigInteger('total_xp')->unsigned();
            $table->bigInteger('actual_stardust')->unsigned();
            $table->bigInteger('jogger')->unsigned();
            $table->integer('kanto');
            $table->integer('collector');
            $table->integer('scientist');
            $table->integer('breeder');
            $table->integer('backpacker');
            $table->integer('sightseer');
            $table->integer('fisher');
            $table->integer('battle_girl');
            $table->integer('ace_trainer');
            $table->integer('youngster');
            $table->integer('pikachu_fan');
            $table->integer('unown');
            $table->integer('johto');
            $table->integer('champion');
            $table->integer('battle_legend');
            $table->integer('berry_master');
            $table->integer('gym_leader');
            $table->integer('hoenn');
            $table->integer('pokemon_ranger');
            $table->integer('idol');
            $table->integer('gentleman');
            $table->bigInteger('pilot')->unsigned();
            $table->integer('sinnoh');
            $table->integer('great_league_veteran');
            $table->integer('ultra_league_veteran');
            $table->integer('master_league_veteran');
            $table->integer('cameraman');
            $table->integer('unova');
            $table->integer('purifier');
            $table->integer('hero');
            $table->integer('ultra_hero');
            $table->integer('best_buddy');
            $table->integer('wayfarer');
            $table->integer('kalos');
            $table->integer('alola');
            $table->integer('galar');
            $table->integer('hisui');
            $table->integer('triathlete');
            $table->integer('rising_star');
            $table->integer('rising_star_duo');
            $table->integer('picnicker');
            $table->integer('successor');
            $table->integer('mega_evolution_guru');
            $table->integer('friend_finder');
            $table->integer('raid_expert');
            $table->integer('tiny_pokemon_collector');
            $table->integer('jumbo_pokemon_collector');
            $table->integer('vivillon_collector');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medals');
    }
}
