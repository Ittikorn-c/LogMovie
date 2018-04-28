<?php

use Faker\Generator as Faker;

$factory->define(App\Movie::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'cover_image' => $faker->text,
        'vdo' => $faker->text,
        'storyline' => $faker->text,
        'budget' => $faker->numberBetween($min = 1, $max = 1000),
        'opening' => $faker->numberBetween($min = 1, $max = 1000),
        'gross' => $faker->numberBetween($min = 1, $max = 1000),
        'cumulative' => $faker->numberBetween($min = 1, $max = 1000),
        'runtime' => $faker->numberBetween($min = 90, $max = 300),
        'color' => $faker->boolean(90),
        'aspect_ratio' => '2.39:1'
    ];
});
