<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bill_Medicine;
use Faker\Generator as Faker;

$factory->define(Bill_Medicine::class, function (Faker $faker) {
    return [
        'bill_id' => $faker->numberBetween(1,100),
        'medicine_id' => $faker->numberBetween(1,100),
    ];
});
