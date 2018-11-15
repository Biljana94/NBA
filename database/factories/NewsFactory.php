<?php

use Faker\Generator as Faker;

use App\News;
use App\User;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\News::class, function (Faker $faker) {
    return [
        'title' => $faker->sentences(1, true),
        'content' => $faker->text(300),
        'user_id' => User::all()->random()->user_id,
    ];
});
