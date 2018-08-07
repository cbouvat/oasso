<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'gender' => $faker->numberBetween(0, 1),
        'lastname' => $faker->lastName,
        'firstname' => $faker->firstName,
        'birthdate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
        'address_line1' => $faker->address,
        'zipcode' => $faker->postcode,
        'city' => $faker->city,
        'email' => $faker->unique()->safeEmail,
        'volonteer' => $faker->boolean,
        'delivery' => $faker->boolean,
        'newspaper' => $faker->boolean,
        'newsletter' => $faker->boolean,
        'mailing' => $faker->boolean,
        'comment' => $faker->text(75),
        'alert' => $faker->boolean,
        'remember_token' => str_random(10),
    ];
});
