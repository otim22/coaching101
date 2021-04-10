<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\Year;
use App\Models\Item;
use App\Models\Term;
use App\Models\Category;
use App\Models\ItemContent;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(ItemContent::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'slug' => $faker->slug,
        'subtitle' => $faker->text,
        'description' => $faker->paragraph,
        'price' => $faker->numberBetween(1000, 10000),
        'is_approved' => $faker->boolean(true),
        'item_id' => Item::all()->random()->id,
        'category_id' => Category::all()->random()->id,
        'year_id' => Year::all()->random()->id,
        'term_id' => Term::all()->random()->id,
        'user_id' => User::all()->random()->id,
    ];
});
