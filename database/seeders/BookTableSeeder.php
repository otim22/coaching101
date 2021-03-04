<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Book;
use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = factory(Book::class, 100)->create();

        $imageUrl = 'http://via.placeholder.com/800x650';

        foreach ($books as $book) {
            $book->addMediaFromUrl($imageUrl)->toMediaCollection('default');
        }
    }
}
