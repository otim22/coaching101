<?php

namespace Database\Seeders;

use App\Models\Year;
use Illuminate\Database\Seeder;

class YearTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $years = [
            'Senior one', 'Senior two', 'Senior three', 'Senior four', 'Senior five',
            'Senior six', 'Year one', 'Year two', 'Year three', 'Year four'
        ];
        
        foreach ($years as $year) {
            factory(Year::class)->create([
                'name' => $year
            ]);
        }
    }
}
