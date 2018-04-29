<?php

use Faker\Generator as Faker;

$factory->define(App\Genre::class, function (Faker $faker) {
    return [
        //
        	'movie_id' =>$faker->numberBetween($min = 1, $max = 10),
        	'genres' =>$faker->randomElement(['Action','Adventure','Sci-Fi']),
    ];
});
