<?php

use Faker\Generator as Faker;

$factory->define(App\Theme::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'content' => $faker->content,
        'thumbnail'=> $faker->thumnail,
    ];
});
