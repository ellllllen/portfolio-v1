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

$factory->define(\Ellllllen\Portfolio\Articles\Tags\Tag::class, function (Faker $faker) {
    return [
        'tag' => $faker->text(10),
    ];
});