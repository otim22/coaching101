<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Subject;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Subject::class, function (Faker $faker) {

    return [
        'subject_title' => $faker->sentence(),
        'subject_subtitle' => $faker->text,
        'subject_description' => $faker->paragraph(),
        'subject' => $faker->randomElement(['Mathematics' ,'Science', 'English', 'History']),
        'class' => $faker->randomElement(['Senior one' ,'Senior two', 'Senior three', 'Senior four']),
        'level' => $faker->randomElement(['Term one' ,'Term two', 'Term three']),
        'content_title' => $faker->sentence(),
        'content_file' => $faker->file($sourceDir='storage/app/public', $targetDir='storage/app/public/', false),
        'content_description' => $faker->paragraph(),
        'resource_attachment' => $faker->file($sourceDir='storage/app/public', $targetDir='storage/app/public/', false),
        'students_learn' => $faker->text,
        'class_requirement' => $faker->text,
        'target_student' => $faker->text,
        'welcome_message' => $faker->sentence(),
        'congratulations_message' => $faker->sentence()
    ];
});
