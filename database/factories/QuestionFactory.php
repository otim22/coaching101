<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Question;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence,
        'subject_id' => factory('App\Models\Subject')->create()->id
    ];
});
