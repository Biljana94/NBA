<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            //strani kljuc u tabeli (user_id); povezujemo comments sa users tabelom
            $table->unsignedInteger('user_id'); ///ova fnc znaci da nesto ne moze biti negativno
            $table->foreign('user_id') //(user koji postavlja komentar)komentar za koji tim je vezan
                ->references('id') //referencira 'id' - preko id
                ->on('users') //na users tabelu
                ->onDelete('cascade'); //kad se ibrise user da se obrisu i komentari od usera
            //povezujemo comments sa teams tabelom preko 'id'
            $table->unsignedInteger('team_id');
            $table->foreign('team_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');
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
        Schema::dropIfExists('comments');
    }
}
