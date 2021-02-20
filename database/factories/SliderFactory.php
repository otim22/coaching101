<?php

namespace Database\Factories;

use App\Models\Slider;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

$factory->define(Slider::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(10, true),
        'description' => $faker->realText(22),
        'button_text' => $faker->name,
        'button_link' => $faker->sentence(3, true)
    ];
});
