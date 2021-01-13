<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\Subject;
use Faker\Generator as Faker;
use App\Models\SubjectSubscription;

$factory->define(SubjectSubscription::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'subject_id' => Subject::all()->random()->id,
    ];
});
