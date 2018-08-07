<?php

use Faker\Generator as Faker;

$factory->define(App\Role::class, function (Faker $faker) {
    return [
        'user_id' =>$faker->randomNumber(),
        'role_type_id' =>$faker->numberBetween(0, 2)
    ];
});
