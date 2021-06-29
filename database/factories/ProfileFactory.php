<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Year;
use App\Models\User;
use App\Models\Profile;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'year_id' => Year::all()->random()->id,
        'dob' => $faker->dateTimeBetween('1990-01-01', '2015-12-31')->format('d/m/Y'),
        'category_id' => Category::all()->random()->id,
        'school' => $faker->word,
        'phone' => $faker->e164PhoneNumber,
        'bio' => $faker->sentence(10, true),
        'user_id' => User::all()->random()->id,
    ];
});
