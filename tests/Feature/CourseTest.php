<?php

namespace Tests\Feature;

use App\Course;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_course_can_be_added()
    {
        $this->post('/api/courses', $this->data());

        $course = Course::first();

        $this->assertCount(1, Course::all());
        $this->assertEquals('Course title', $course->course_title);
        $this->assertEquals('Course subtitle', $course->course_subtitle);
        $this->assertEquals('Course description', $course->course_description);
        $this->assertEquals('Mathematics', $course->subject);
        $this->assertEquals('Senior two', $course->class);
        $this->assertEquals('Term one', $course->level);
        $this->assertEquals('Content title', $course->content_title);
        $this->assertEquals('51c18abf-c37f-3288-b5a9-c15466e763b0.gitignore', $course->content_file);
        $this->assertEquals('Content description', $course->content_description);
        $this->assertEquals('51c18abf-c37f-3288-b5a9-c15466e763b0.gitignore', $course->resource_attachment);
        $this->assertEquals('Student learn', $course->students_learn);
        $this->assertEquals('Should have studied literacy', $course->class_requirement);
        $this->assertEquals('Secondary students', $course->target_student);
        $this->assertEquals('Welcome to my course', $course->welcome_message);
        $this->assertEquals('You are ready for exams', $course->congratulations_message);
    }

    /** @test */
    public function fields_are_required()
    {
        collect([
            'course_title', 'course_subtitle', 'course_description', 'subject', 'class', 'level',
            'content_title', 'content_file', 'content_description','resource_attachment', 'students_learn',
            'class_requirement', 'target_student', 'welcome_message', 'congratulations_message'
        ])->each(function($field) {
            $response = $this->post('/api/courses', array_merge($this->data(), [$field => '']));

            $response->assertSessionHasErrors($field);
            $this->assertCount(0, Course::all());
        });
    }

    /** @test */
    public function uploads_files_success()
    {
        $this->post( '/api/courses', array_merge($this->data(), [
            'resource_attachment' => $fake_resource_attachment = $this->faker->file($sourceDir='storage/app/public', $targetDir='storage/app/public/', false)
        ]));

        $this->assertEquals($fake_resource_attachment, Course::first()->resource_attachment);

        Storage::disk('public')->assertExists($fake_resource_attachment);
    }

    private function data()
    {
        return [
            'course_title' => 'Course title',
            'course_subtitle' => 'Course subtitle',
            'course_description' => 'Course description',
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
            'welcome_message' => 'Welcome to my course',
            'congratulations_message' => 'You are ready for exams'
        ];
    }
}
