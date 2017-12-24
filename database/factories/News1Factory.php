<?php

use Faker\Generator as Faker;

$factory->define(App\News1::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'content' => $faker->sentence,
        'views' => 1,
    ];
});
