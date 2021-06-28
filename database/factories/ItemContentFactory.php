<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\Year;
use App\Models\Item;
use App\Models\Term;
use App\Models\Level;
use App\Models\Currency;
use App\Models\Standard;
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
        'objective' => $faker->sentences,
        'price' => $faker->numberBetween(1000, 10000),
        'is_approved' => $faker->boolean(true),
        'standard_id' => Standard::all()->random()->id,
        'level_id' => Level::all()->random()->id,
        'item_id' => Item::all()->random()->id,
        'currency_id' => Currency::all()->random()->id,
        'category_id' => Category::all()->random()->id,
        'year_id' => Year::all()->random()->id,
        'term_id' => Term::all()->random()->id,
        'user_id' => User::all()->random()->id,
    ];
});
