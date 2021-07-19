<?php

namespace Database\Seeders;

use App\Models\Year;
use App\Models\Standard;
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
        $cambridge = 1;
        $uneb = 2;
        $standards = [$cambridge, $uneb];

        $years = [
           $cambridge => [
               'Year 7', 'Year 8', 'Year 9', 'Year 10', 'Year 11', 'Year 12', 'Year 13'
           ],
           $uneb => [
               'Senior one', 'Senior two', 'Senior three', 'Senior four',  'Senior five', 'Senior six'
           ]
        ];

        foreach($standards as $standard) {
           $standardYears = $years[$standard];
           foreach($standardYears as $year) {
               factory(Year::class)->create([
                   'name' => $year,
                   'standard_id' => $standard,
               ]);
           }
        }
    }
}
