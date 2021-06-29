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
        $terms = ['Term one', 'Term two', 'Term three'];
        
        foreach ($terms as $term) {
            factory(Term::class)->create([
                'name' => $term
            ]);
        }
    }
}
