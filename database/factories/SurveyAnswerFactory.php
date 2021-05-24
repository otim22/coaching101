<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\SurveyAnswer;
use App\Models\SurveyQuestion;

$factory->define(SurveyAnswer::class, function (Faker $faker) {
    return [
        'answer' => $faker->sentence,
        'survey_question_id' => SurveyQuestion::all()->random()->id,
    ];
});
