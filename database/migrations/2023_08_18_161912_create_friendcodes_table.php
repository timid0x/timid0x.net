<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friendcodes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('country_id')->constrained();
            $table->integer('team_id');
            $table->integer('trainer_type');
            $table->biginteger('code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friendcodes');
    }
}
