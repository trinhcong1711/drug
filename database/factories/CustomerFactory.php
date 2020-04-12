<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->freeEmail,
        'tel' => $faker->unique()->numberBetween(111111111,99999999),
        'image' => $faker->imageUrl(640,480),
        'status' => $faker->randomElement([0,1]),
        'gender' => $faker->randomElement([0,1]),
        'address' => $faker->address,
        'facebook' => $faker->url,
        'point' => $faker->numberBetween(0,999999),
        'identity' => $faker->randomElement([0,1]),
        'zalo' => $faker->url,
        'api_token' => Null,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
