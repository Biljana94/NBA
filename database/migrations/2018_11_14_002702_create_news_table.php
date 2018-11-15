<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->unsignedInteger('user_id'); //id ne moze biti negativan broj
            $table->foreign('user_id') //strani kljuc 'user_id'
                ->references('id') //preko 'id'
                ->on('users') //se povezujemo sa tabelom 'users'
                ->onDelete('cascade'); //kaskadno brisanje
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
        Schema::dropIfExists('news');
    }
}
