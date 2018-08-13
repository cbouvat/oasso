<?php

use Faker\Generator as Faker;

$factory->define(App\Subscription::class, function (Faker $faker) {
    return [
        'amount' => $faker->numberBetween(0, 20),
        'opt_out_mail' => $faker->boolean,
        'user_id' => $faker->randomNumber(),
        'date_start' => $faker->date(),
        'date_end' => $faker->date(),
        'subscription_source' => $faker->numberBetween(0, 1),
        'subscription_type_id' => $faker->numberBetween(1, 4),

    ];
});
