<?php

use Faker\Generator as Faker;

$factory->define(App\Payment::class, function (Faker $faker) {
    return [
        'payment_type' => $faker->randomElement($array = array('gift', 'subscription')),
        'payment_id' => $faker->randomNumber(),
        'amount' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
        'user_id' => $faker->randomNumber(),
        'payment_method_id' => $faker->numberBetween(1, 5)
    ];
});
