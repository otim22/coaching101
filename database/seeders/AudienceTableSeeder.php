<?php

namespace Database\Seeders;

use App\Models\Audience;
use Illuminate\Database\Seeder;

class AudienceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Audience::class, 50)->create();
    }
}
