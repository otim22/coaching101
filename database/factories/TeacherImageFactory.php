<?php

namespace Database\Factories;

use App\Models\TeacherImage;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

$factory->define(TeacherImage::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(8, true),
        'description' => $faker->realText(25),
        'button_text' => $faker->sentence(3, true)
    ];
});
