<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Survey;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Survey::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->sentences,
    ];
});
