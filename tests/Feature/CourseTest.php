<?php

namespace Tests\Feature;

use App\Model\Subject;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class SubjectTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_subject_can_be_added()
    {
        $this->post('/api/courses', $this->data());

        $subject = Subject::first();

        $this->assertCount(1, Subject::all());
        $this->assertEquals('Subject title', $subject->subject_title);
        $this->assertEquals('Subject subtitle', $subject->subject_subtitle);
        $this->assertEquals('Subject description', $subject->subject_description);
        $this->assertEquals('Mathematics', $subject->subject);
        $this->assertEquals('Senior two', $subject->class);
        $this->assertEquals('Term one', $subject->level);
        $this->assertEquals('Content title', $subject->content_title);
        $this->assertEquals('51c18abf-c37f-3288-b5a9-c15466e763b0.gitignore', $subject->content_file);
        $this->assertEquals('Content description', $subject->content_description);
        $this->assertEquals('51c18abf-c37f-3288-b5a9-c15466e763b0.gitignore', $subject->resource_attachment);
        $this->assertEquals('Student learn', $subject->students_learn);
        $this->assertEquals('Should have studied literacy', $subject->class_requirement);
        $this->assertEquals('Secondary students', $subject->target_student);
        $this->assertEquals('Welcome to my subject', $subject->welcome_message);
        $this->assertEquals('You are ready for exams', $subject->congratulations_message);
    }

    /** @test */
    public function fields_are_required()
    {
        collect([
            'subject_title', 'subject_subtitle', 'subject_description', 'subject', 'class', 'level',
            'content_title', 'content_file', 'content_description','resource_attachment', 'students_learn',
            'class_requirement', 'target_student', 'welcome_message', 'congratulations_message'
        ])->each(function($field) {
            $response = $this->post('/api/courses', array_merge($this->data(), [$field => '']));

            $response->assertSessionHasErrors($field);
            $this->assertCount(0, Subject::all());
        });
    }

    /** @test */
    public function uploads_files_success()
    {
        $this->post( '/api/courses', array_merge($this->data(), [
            'resource_attachment' => $fake_resource_attachment = $this->faker->file($sourceDir='storage/app/public', $targetDir='storage/app/public/', false)
        ]));

        $this->assertEquals($fake_resource_attachment, Subject::first()->resource_attachment);

        Storage::disk('public')->assertExists($fake_resource_attachment);
    }

    private function data()
    {
        return [
            'subject_title' => 'Subject title',
            'subject_subtitle' => 'Subject subtitle',
            'subject_description' => 'Subject description',
            'subject' => 'Mathematics',
            'class' => 'Senior two',
            'level' => 'Term one',
            'content_title' => 'Content title',
            'content_file' => '51c18abf-c37f-3288-b5a9-c15466e763b0.gitignore',
            'content_description' => 'Content description',
            'resource_attachment' => '51c18abf-c37f-3288-b5a9-c15466e763b0.gitignore',
            'students_learn' => 'Student learn',
            'class_requirement' => 'Should have studied literacy',
            'target_student' => 'Secondary students',
            'welcome_message' => 'Welcome to my subject',
            'congratulations_message' => 'You are ready for exams'
        ];
    }
}
