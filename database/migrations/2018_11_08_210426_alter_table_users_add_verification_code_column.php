<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUsersAddVerificationCodeColumn extends Migration
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
            $table->string('verification_code')->nullable(); //nullable() jer nekad hocemo da nema  vrednost (RegisterController.php)
                            //stavili smo da je ova kolona nullable, jer kad verifikujemo usera kasnije zelimo da mu 'oduzmemo' taj kod
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumn('verification_code'); //brisemo kolonu koju smo dodali
    }
}
