<?php

use Faker\Generator as Faker;

$factory->define(App\Subscription::class, function (Faker $faker) {
    return [
        'amount' =>$faker->numberBetween(0, 20),
        'opt_out_mail' =>$faker->boolean,
        'user_id' =>$faker->randomNumber(),
        'subscription_type_id' =>$faker->numberBetween(1, 4),
        'subscription_year' => '2018-01-01'

    ];
});
