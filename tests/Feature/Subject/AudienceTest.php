<?php

namespace Tests\Feature;

use Tests\TestCase;
use Faker\Factory as Faker;
use App\Models\Subject;
use App\Models\Audience;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AudienceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_valid_audience_can_be_created()
    {
        $this->withoutExceptionHandling();

        $subject = factory(Subject::class)->create([
            'title' => 'Subject title',
            'slug' => 'subject_title',
            'subtitle' => 'subject subtitle',
            'description' => 'Subject description',
            'category' => 'Test',
        ]);

        $response = $this->post('/subjects/subject_title/audiences', [
            'student_learn' => ['Maths 1', 'Maths 2'],
            'class_requirement' => ['Curriculus'],
            'target_student' => ['Senior 4', 'Senior 5', 'Senior 6']
        ]);

        $response->assertRedirect("/subjects/subject_title/messages");

        $this->assertEquals(1, Audience::count());
    }
}
