<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\Profile;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'category_id' => Category::all()->random()->id,
        'school' => $faker->word,
        'bio' => $faker->sentence(10, true),
        'user_id' => User::all()->random()->id,
    ];
});
