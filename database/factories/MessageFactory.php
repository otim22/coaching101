<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'subject_id' => factory('App\Models\Subject')->create()->id,
        'welcome_message' => $faker->text,
        'congragulation_message' => $faker->text
    ];
});
