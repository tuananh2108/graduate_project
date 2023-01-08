<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Order, User};
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'order_code' => $faker->unique()->regexify('[A-Z]{5}[0-9]{10}'),
        'order_date' => $faker->dateTimeBetween('-5 years', now()),
        'user_id' => $faker->randomElement(User::pluck('id')),
        'status' => $faker->randomElement(['active', 'pending', 'delivering', 'delivered', 'cancel', 'inactive']),
    ];
});
