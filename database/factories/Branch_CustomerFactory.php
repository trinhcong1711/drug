<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Branch_Customer;
use Faker\Generator as Faker;

$factory->define(Branch_Customer::class, function (Faker $faker) {
    return [
        'branch_id' => $faker->numberBetween(1,100),
        'customer_id' => $faker->numberBetween(1,100),
    ];
});
