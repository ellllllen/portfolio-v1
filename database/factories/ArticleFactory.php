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

$factory->define(\Ellllllen\PersonalWebsite\Articles\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->text(190),
        'section' => $faker->paragraph,
        'image' => $faker->image('public/storage/images',400,300, null, false) ,
        'created_by' => function () {
            return factory(\Ellllllen\User::class)->create()->id;
        },
    ];
});
