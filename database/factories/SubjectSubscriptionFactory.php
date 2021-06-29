<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\ItemContent;
use Faker\Generator as Faker;
use App\Models\Subscription;

$factory->define(Subscription::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
        'item_content_id' => ItemContent::all()->random()->id,
    ];
});
