<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'item_content_id' => factory('App\Models\ItemContent')->create()->id,
        'welcome_message' => $faker->text,
        'congragulation_message' => $faker->text
    ];
});
