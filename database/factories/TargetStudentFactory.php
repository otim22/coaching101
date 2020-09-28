<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TargetStudent;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(TargetStudent::class, function (Faker $faker) {
    return [
        'subjects_id' => $faker->numberBetween(1, 50),
        'student_learn' => $faker->sentences,
        'class_requirement' => $faker->sentences,
        'target_student' =>  $faker->sentences
    ];
});
