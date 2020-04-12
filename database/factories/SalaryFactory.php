<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Salary;
use Faker\Generator as Faker;

$factory->define(Salary::class, function (Faker $faker) {
    return [
        'wage' => $faker->numberBetween(100000000,50000000),
        'bonus' => $faker->numberBetween(100000000,50000000),
        'total_wage' => $faker->numberBetween(100000000,50000000),
        'staff_id' => $faker->numberBetween(1,100),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
