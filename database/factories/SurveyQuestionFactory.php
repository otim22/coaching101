<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Survey;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\SurveyQuestion;

$factory->define(SurveyQuestion::class, function (Faker $faker) {
    return [
        'question' => $faker->sentence,
        'survey_id' => Survey::all()->random()->id,
    ];
});
