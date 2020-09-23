<?php

namespace Database\Seeders;

use App\Models\SubjectIntroduction;
use Illuminate\Database\Seeder;

class SubjectIntroductionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SubjectIntroduction::class, 20)->create();
    }
}
