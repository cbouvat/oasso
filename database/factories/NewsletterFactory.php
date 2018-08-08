<?php

use Faker\Generator as Faker;

$factory->define(App\Newsletter::class, function (Faker $faker) {
    return [
        'title' =>$faker->text(30),
        'type' =>$faker->numberBetween(0, 9),
        'html_content' =>$faker->randomHtml(2, 3),
        'text_content' =>$faker->text(150),
        'user_id' =>$faker->unique()->numberBetween(1, 50)
    ];
});
