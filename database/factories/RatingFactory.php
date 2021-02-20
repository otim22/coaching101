<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\Rating;
use App\Models\Subject;
use Faker\Generator as Faker;

$factory->define(Rating::class, function (Faker $faker) {
    return [
        'rating' => $faker->numberBetween(1, 5),
        'comment' => $faker->sentence,
        'user_id' => User::all()->random()->id,
        'subject_id' => Subject::all()->random()->id
    ];
});
