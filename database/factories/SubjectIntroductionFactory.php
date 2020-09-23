<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SubjectIntroduction;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(SubjectIntroduction::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'subtitle' => $faker->text,
        'description' => $faker->paragraph()
    ];
});
