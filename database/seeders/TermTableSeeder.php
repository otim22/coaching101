<?php

namespace Database\Seeders;

use App\Models\Term;
use Illuminate\Database\Seeder;

class TermTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Term::class)->create([
            'name' => 'Term one'
        ]);
        factory(Term::class)->create([
            'name' => 'Term two'
        ]);
        factory(Term::class)->create([
            'name' => 'Term three'
        ]);
    }
}
