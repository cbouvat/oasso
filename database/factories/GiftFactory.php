<?php

use Faker\Generator as Faker;

$factory->define(App\Gift::class, function (Faker $faker) {
    return [
        'amount' =>$faker->randomFloat(2, 5, 10000),
        'user_id' =>$faker->randomNumber()

    ];
});
