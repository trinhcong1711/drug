<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Medicine;
use Faker\Generator as Faker;

$factory->define(Medicine::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'code' => $faker->unique()->ean8,
        'composition' => $faker->text(200),
        'substances_active' => $faker->text(200),
        'production' => $faker->text(200),
        'manufacturer' => $faker->text(200),
        'packing' => $faker->text(200),
        'status' => $faker->randomElement([0,1]),
        'note' => $faker->text(200),
        'prescription_drug' => $faker->randomElement([0,1]),
        'base_price' => $faker->numberBetween(10000,1000000),
        'final_price' => $faker->numberBetween(10000,1000000),
        'warning' => $faker->numberBetween(1,10),
        'date' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'exp' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'category_id' => $faker->numberBetween(1,100),
        'unit_id' => $faker->numberBetween(1,100),
        'position_id' => $faker->numberBetween(1,100),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
