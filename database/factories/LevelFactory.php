<?php

namespace Database\Factories;

use App\Models\Level;
use Faker\Generator as Faker;

$factory->define(Level::class, function (Faker $faker) {
    return [
        'name' => $faker->title
    ];
});
