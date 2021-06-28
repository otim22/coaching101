<?php

namespace Database\Factories;

use App\Models\Year;
use App\Models\Level;
use App\Models\Standard;
use Faker\Generator as Faker;

$factory->define(Year::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
        'standard_id' => Standard::all()->random()->id,
        'level_id' => Level::all()->random()->id
    ];
});
