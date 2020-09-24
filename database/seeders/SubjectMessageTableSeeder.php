<?php

namespace Database\Seeders;

use App\Models\SubjectMessage;
use Illuminate\Database\Seeder;

class SubjectMessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SubjectMessage::class, 2)->create();
    }
}
