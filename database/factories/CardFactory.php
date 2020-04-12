<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Card;
use Faker\Generator as Faker;

$factory->define(Card::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'number' => $faker->unique()->numberBetween(100000000,999999999),
        'bank' => $faker->lastName,
        'branch' => $faker->lastName,
        'admin_id' => $faker->numberBetween(1,100),
        'staff_id' => $faker->numberBetween(1,100),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
