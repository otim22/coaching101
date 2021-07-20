<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faqs = [
            [
                'title' => 'Where do I take this course?',
                'description' => 'The course is completely online so you can partake whenever and wherever you would like (as long as you have internet access).'
            ],
            [
                'title' => 'Where is onCloudLearning located?',
                'description' => 'onCloudLearning has an office located in Kampala, Uganda.'
            ],
            [
                'title' => 'When does it begin?',
                'description' => 'Whenever you like! You will be given lifetime access to the material and can take at a pace that is right for you!'
            ],
            [
                'title' => 'How long does it take?',
                'description' => 'The course is designed so you can take at a speed that is best for you. Most students will do it over 3-4 weeks and others will complete in a few days.',
            ],
            [
                'title' => 'Do you have a refund policy?',
                'description' => 'Yes, if you are having issues accessing your course we will give you a full refund up to 48 hours after purchase.'
            ],
            [
                'title' => 'How do I sign up and pay?',
                'description' => 'Please follow the links under the courses to complete your payment.'
            ]
        ];

        foreach ($faqs as $faq) {
            factory(Faq::class)->create([
                'title' => $faq['title'],
                'description' => $faq['description']
            ]);
        }
    }
}
