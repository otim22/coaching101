<?php

namespace Database\Factories;

use App\Models\Menu;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Menu::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
    ];
});
