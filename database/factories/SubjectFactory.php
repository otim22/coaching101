<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\Subject;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Subject::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'slug' => $faker->slug,
        'subtitle' => $faker->text,
        'description' => $faker->paragraph,
        'category' => $faker->word,
        'user_id' => User::all()->random()->id,
    ];
});
