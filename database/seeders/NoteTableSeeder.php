<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Note;
use Illuminate\Database\Seeder;

class NoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Note::class, 100)->create();
    }
}
