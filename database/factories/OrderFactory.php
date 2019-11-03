<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'invoice_number' => $faker->randomNumber(),
        'total_amount' => $faker->numberBetween(10, 1000),
        'status' => $faker->randomElement(['new', 'processed']),
    ];
});
