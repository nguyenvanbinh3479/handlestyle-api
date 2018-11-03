<?php

use Faker\Generator as Faker;

$factory->define(App\Feedback::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'content' => $faker->content,
        'user_id' => $faker->user_id
    ];
});
