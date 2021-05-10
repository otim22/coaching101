<?php

namespace Database\Factories;

use App\Models\Level;
use App\Models\Standard;
use Faker\Generator as Faker;

$factory->define(Level::class, function (Faker $faker) {
    return [
        'name' => $faker->title,
        'standard_id' => Standard::all()->random()->id,
    ];
});
