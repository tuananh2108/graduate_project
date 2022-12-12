<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Buihuycuong\Vnfaker\VNFaker;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => vnfaker()->fullname($word = 3),
        'email' => vnfaker()->email(),
        'address' => vnfaker()->city($array = false),
        'phone_number' => vnfaker()->mobilephone($numbers = 10),
    ];
});
