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

    /** @test */
    public function a_welcome_message_is_required_for_a_message_can_be_created()
    {
        $subject = factory(Subject::class)->create([
            'title' => 'Subject title',
            'slug' => 'subject_title',
            'subtitle' => 'subject subtitle',
            'description' => 'Subject description',
            'category' => 'Test',
        ]);

        $message = factory(Message::class)->make([
            'welcome_message' => '',
            'congragulation_message' => 'Thank you for taking our course'
        ]);

        $response = $this->post('/subjects/subject_title/messages', $message->toArray())
                                            ->assertSessionHasErrors(('welcome_message'));

       $this->assertEquals(0, Message::count());
    }

    /** @test */
    public function a_congragulation_message_is_required_for_a_message_can_be_created()
    {
        $subject = factory(Subject::class)->create([
            'title' => 'Subject title',
            'slug' => 'subject_title',
            'subtitle' => 'subject subtitle',
            'description' => 'Subject description',
            'category' => 'Test',
        ]);

        $message = factory(Message::class)->make([
            'welcome_message' => 'Your welcome to our course',
            'congragulation_message' => ''
        ]);

        $response = $this->post('/subjects/subject_title/messages', $message->toArray())
                                            ->assertSessionHasErrors(('congragulation_message'));

       $this->assertEquals(0, Message::count());
    }
}
