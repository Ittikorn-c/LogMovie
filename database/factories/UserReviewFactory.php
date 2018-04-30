<?php

use Faker\Generator as Faker;

$factory->define(App\UserReview::class, function (Faker $faker) {
    return [
    	'user_id' =>$faker->numberBetween($min = 1, $max = 5),
    	'movie_id' =>$faker->numberBetween($min = 1, $max = 5),
    	'review' =>$faker->text,
        //
    ];
});
