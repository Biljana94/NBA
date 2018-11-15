<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //za svakog korisnika (App\User::all()) kreiraj mi toliko vesti (kreiraj mi 5 vesti)
        //funkcija each() prihvata callback fnc i u njoj kao parametar pisemo User.php model zato sto user pise vest
        App\User::all()->each(function(App\User $user) {
            $user->news()->saveMany(factory(App\News::class, 5)->make()); //preko FACTORY pravimo lazne podatke
            //u User.php imamo metodu news() koja je relacija izmedju vesti i korisnika, i ovde je pozivamo
        });
    }
}
