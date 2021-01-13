<?php

namespace Database\Factories;

use App\Models\Term;
use Faker\Generator as Faker;

$factory->define(Term::class, function (Faker $faker) {
    return [
        'name' => $faker->title,
    ];
});
