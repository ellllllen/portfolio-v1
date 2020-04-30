<?php

use Faker\Generator as Faker;

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

$factory->define(\Ellllllen\Portfolio\Articles\Article::class, function (Faker $faker) {
    return [
        'id' => random_int(999999, 99999999),
        'title' => $faker->text(190),
        'section' => $faker->paragraph,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
    ];
});
