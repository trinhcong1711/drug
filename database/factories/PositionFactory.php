<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Position;
use Faker\Generator as Faker;

$factory->define(Position::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'note' => $faker->text(200),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
