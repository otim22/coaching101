<?php

namespace Tests\Feature;

use Tests\TestCase;
use Faker\Factory as Faker;
use App\Models\Subject;
use App\Models\Message;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MessageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_valid_message_can_be_created()
    {
        $this->withoutExceptionHandling();

        $subject = factory(Subject::class)->create([
            'title' => 'Subject title',
            'slug' => 'subject_title',
            'subtitle' => 'subject subtitle',
            'description' => 'Subject description',
            'category' => 'Test',
        ]);

        $response = $this->post('/subjects/subject_title/messages', [
            'welcome_message' => 'Your welcome to our course',
            'congragulation_message' => 'Thank you for taking our course'
        ]);

        $response->assertRedirect("/subjects/subject_title");

        $this->assertEquals(1, Message::count());
    }
}
