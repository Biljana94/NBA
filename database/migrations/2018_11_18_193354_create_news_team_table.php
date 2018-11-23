<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //PIVOT TABELA
        //povezujemo news i team preko njihovih 'id'
        Schema::create('news_team', function (Blueprint $table) {
            $table->integer('news_id');
            $table->integer('team_id');
            $table->primary(['team_id', 'news_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_team');
    }
}
