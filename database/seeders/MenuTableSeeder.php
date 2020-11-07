<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Menu::class)->create([
            'title' => 'Sciences',
            'parent_id' => null,
        ]);
        factory(Menu::class)->create([
            'title' => 'Mathematics',
            'parent_id' => null,
        ]);
        factory(Menu::class)->create([
            'title' => 'Languages',
            'parent_id' => null,
        ]);
        factory(Menu::class)->create([
            'title' => 'History',
            'parent_id' => null,
        ]);
        factory(Menu::class)->create([
            'title' => 'Social studies',
            'parent_id' => null,
        ]);
        factory(Menu::class)->create([
            'title' => 'Vocational subjects',
            'parent_id' => null,
        ]);

        factory(Menu::class)->create([
            'title' => 'Senior One',
            'parent_id' => 1,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Two',
            'parent_id' => 1,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Three',
            'parent_id' => 1,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Four',
            'parent_id' => 1,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Five',
            'parent_id' => 1,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Six',
            'parent_id' => 1,
        ]);

        factory(Menu::class)->create([
            'title' => 'Senior One',
            'parent_id' => 2,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Two',
            'parent_id' => 2,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Three',
            'parent_id' => 2,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Four',
            'parent_id' => 2,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Five',
            'parent_id' => 2,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Six',
            'parent_id' => 2,
        ]);

        factory(Menu::class)->create([
            'title' => 'Senior One',
            'parent_id' => 3,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Two',
            'parent_id' => 3,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Three',
            'parent_id' => 3,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Four',
            'parent_id' => 3,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Five',
            'parent_id' => 3,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Six',
            'parent_id' => 3,
        ]);

        factory(Menu::class)->create([
            'title' => 'Senior One',
            'parent_id' => 4,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Two',
            'parent_id' => 4,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Three',
            'parent_id' => 4,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Four',
            'parent_id' => 4,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Five',
            'parent_id' => 4,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Six',
            'parent_id' => 4,
        ]);

        factory(Menu::class)->create([
            'title' => 'Senior One',
            'parent_id' => 5,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Two',
            'parent_id' => 5,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Three',
            'parent_id' => 5,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Four',
            'parent_id' => 5,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Five',
            'parent_id' => 5,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Six',
            'parent_id' => 5,
        ]);

        factory(Menu::class)->create([
            'title' => 'Senior One',
            'parent_id' => 6,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Two',
            'parent_id' => 6,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Three',
            'parent_id' => 6,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Four',
            'parent_id' => 6,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Five',
            'parent_id' => 6,
        ]);
        factory(Menu::class)->create([
            'title' => 'Senior Six',
            'parent_id' => 6,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 7,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 7,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 7,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 8,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 8,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 8,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 9,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 9,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 9,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 10,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 10,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 10,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 11,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 11,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 11,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 12,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 12,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 12,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 13,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 13,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 13,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 14,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 14,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 14,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 15,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 15,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 15,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 16,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 16,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 16,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 17,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 17,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 17,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 18,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 18,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 18,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 19,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 19,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 19,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 20,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 20,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 20,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 21,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 21,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 21,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 22,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 22,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 22,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 23,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 23,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 23,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 24,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 24,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 24,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 25,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 25,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 25,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 26,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 26,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 26,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 27,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 27,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 27,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 28,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 28,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 28,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 29,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 29,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 29,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 30,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 30,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 30,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 31,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 31,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 31,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 32,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 32,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 32,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 33,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 33,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 33,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 34,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 34,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 34,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 35,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 35,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 35,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 36,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 36,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 36,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 37,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 37,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 37,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 38,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 38,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 38,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 39,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 39,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 39,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 40,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 40,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 40,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 41,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 41,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 41,
        ]);

        factory(Menu::class)->create([
            'title' => 'Term One',
            'parent_id' => 42,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Two',
            'parent_id' => 42,
        ]);
        factory(Menu::class)->create([
            'title' => 'Term Three',
            'parent_id' => 42,
        ]);
    }
}
