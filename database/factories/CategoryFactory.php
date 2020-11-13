<?php

namespace Database\Factories;

use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'slug' => $faker->slug
    ];
});
