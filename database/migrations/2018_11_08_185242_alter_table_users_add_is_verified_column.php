<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUsersAddIsVerifiedColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //ovde ide `Schema::table` jer dodajemo polje u tabelu (ako bi napisali `Schema::create` napravice nam opet users tabelu)
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_verified');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumn('is_verified'); //ono sto smo uradili u up() funkciji, suprotno radimo u down() ->to znaci da smo ovde u up() dodali polje a u down() izbrisali to polje
    }
}
