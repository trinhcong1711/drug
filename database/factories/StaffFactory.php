<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Staff;
use Faker\Generator as Faker;

$factory->define(Staff::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'branch_id' => $faker->numberBetween(1,100),
        'email' => $faker->unique()->freeEmail,
        'tel' => $faker->unique()->numberBetween(1111111111,999999999),
        'image' => $faker->imageUrl(640,480),
        'status' => $faker->randomElement([0,1]),
        'gender' => $faker->randomElement([0,1]),
        'address' => $faker->address,
        'facebook' => $faker->url,
        'zalo' => $faker->url,
        'api_token' => Str::random(10),
        'password' => 'admin123', // password
        'remember_token' => Str::random(10),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
