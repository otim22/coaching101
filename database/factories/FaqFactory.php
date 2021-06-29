<?php

namespace Database\Factories;

use App\Models\Faq;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

$factory->define(Faq::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(8, true),
        'description' => $faker->realText(25),
    ];
});
