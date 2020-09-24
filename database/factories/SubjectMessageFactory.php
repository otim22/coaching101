<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SubjectMessage;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(SubjectMessage::class, function (Faker $faker) {
    return [
        'welcome_message' => $faker->text,
        'congragulation_message' => $faker->text
    ];
});
