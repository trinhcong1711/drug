<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bill;
use Faker\Generator as Faker;

$factory->define(Bill::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'code' => $faker->unique()->ean8,
        'vat' => $faker->numberBetween(1,20),
        'sale' => $faker->numberBetween(0,100),
        'total_money' => $faker->numberBetween(10000000,100000000),
        'payment_method' => $faker->randomElement([0,1]),
        'note' => $faker->text(200),
        'status' => $faker->randomElement([0,1]),
        'staff_id' => $faker->numberBetween(1,100),
        'customer_id' => $faker->numberBetween(1,100),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
