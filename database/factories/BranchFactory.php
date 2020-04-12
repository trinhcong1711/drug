<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Branch;
use Faker\Generator as Faker;

$factory->define(Branch::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'short_name' => $faker->firstName,
        'address' => $faker->address,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
