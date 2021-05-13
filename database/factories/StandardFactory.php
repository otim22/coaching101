<?php

namespace Database\Factories;

use App\Models\Standard;
use Faker\Generator as Faker;

$factory->define(Standard::class, function (Faker $faker) {
    return [
        'name' => $faker->title,
        'status' => 'false'
    ];
});
