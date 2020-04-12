<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug' => $faker->unique()->slug,
        'parent_id' => $faker->randomDigitNotNull,
        'status' => $faker->randomElement([0,1]),
        'note' => $faker->text(200),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
