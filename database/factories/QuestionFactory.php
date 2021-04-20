<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Question;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence,
        'item_content_id' => factory('App\Models\ItemContent')->create()->id
    ];
});
