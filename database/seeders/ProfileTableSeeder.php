<?php

namespace Database\Seeders;

use App\Models\Year;
use App\Models\User;
use App\Models\Profile;
use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 25; $i++) {
            factory(Profile::class)->create($this->createTeacherData($faker));
        }

        for ($i=0; $i < 25; $i++) {
            factory(Profile::class)->create($this->createStudentData($faker));
        }
    }

    public function createTeacherData($faker)
    {
        return [
            'year_id' => Year::all()->random()->id,
            'dob' => null,
            'category_id' => Category::all()->random()->id,
            'school' => $faker->word,
            'phone' => $faker->e164PhoneNumber,
            'bio' => $faker->sentence(10, true),
            'user_id' => User::all()->random()->id,
        ];
    }

    public function createStudentData($faker)
    {
        return [
            'year_id' => Year::all()->random()->id,
            'dob' => $faker->dateTimeBetween('1990-01-01', '2015-12-31')->format('d/m/Y'),
            'category_id' => null,
            'school' => $faker->word,
            'phone' => $faker->e164PhoneNumber,
            'bio' => $faker->sentence(10, true),
            'user_id' => User::all()->random()->id,
        ];
    }
}
