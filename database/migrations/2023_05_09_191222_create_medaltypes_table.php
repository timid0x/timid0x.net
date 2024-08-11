<?php
###### Sat Jun 3 12:02:57 COT 2023

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedaltypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medaltypes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained();
            $table->integer('schoolkid');
            $table->integer('black_belt');
            $table->integer('bird_keeper');
            $table->integer('punk_girl');
            $table->integer('ruin_maniac');
            $table->integer('hiker');
            $table->integer('bug_catcher');
            $table->integer('hex_maniac');
            $table->integer('rail_staff');
            $table->integer('kindler');
            $table->integer('swimmer');
            $table->integer('gardener');
            $table->integer('rocker');
            $table->integer('psychic');
            $table->integer('skier');
            $table->integer('dragon_tamer');
            $table->integer('delinquent');
            $table->integer('fairytale_girl');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medaltypes');
    }
}
