<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Message;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'subjects_id' => $faker->numberBetween(1, 50),
        'welcome_message' => $faker->text,
        'congragulation_message' => $faker->text
    ];
});
