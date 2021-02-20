<?php

namespace Tests\Feature;

use Tests\TestCase;
use Faker\Factory as Faker;
use App\Models\Subject;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubjectTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    // public function it_forbids_an_unauthenticated_user_to_create_a_subject()
    // {
    //     $photo = UploadedFile::fake()->image('photo.jpg');
    //     $response = $this->post('/subjects', [
    //         'title' => 'Subject title',
    //         'subtitle' => 'subject subtitle',
    //         'description' => 'Subject description',
    //         'category' => 'Test',
    //         'cover_image' => $photo
    //     ]);
    //
    //     $response->assertForbidden();
    //
    // // or $response->assertStatus(403);
    // }

    /** @test */
    public function a_valid_subject_can_be_created()
    {
        $this->withoutExceptionHandling();

        $photo = UploadedFile::fake()->image('photo.jpg');
        $data = [
            'title' => 'Subject title',
            'subtitle' => 'subject subtitle',
            'description' => 'Subject description',
            'category' => 'Test',
            'cover_image' => $photo
        ];

        $response = $this->post('/subjects', [
            'title' => 'Subject title',
            'subtitle' => 'subject subtitle',
            'description' => 'Subject description',
            'category' => 'Test',
            'cover_image' => $photo
        ]);
        $response->assertRedirect("subjects/subject_title/audiences");

        $subject =  Subject::first();
        $cover_image = $subject->getFirstMediaUrl();

        $this->assertFileExists($data['cover_image'], $cover_image);
        $this->assertEquals(1, Subject::count());
    }

    /** @test */
    public function a_cover_image_is_required_to_store_a_subject()
    {
        $subject = factory(Subject::class)->make([
            'title' => 'Subject title',
            'subtitle' => 'subject subtitle',
            'description' => 'Subject description',
            'category' => 'Test',
            'cover_image' => null
        ]);

        $response = $this->post('/subjects', $subject->toArray())
                                            ->assertSessionHasErrors(('cover_image'));

       $this->assertEquals(0, Subject::count());
    }

    /** @test */
    public function a_title_is_required_to_store_a_subject()
    {
        $photo = UploadedFile::fake()->image('photo.jpg');
        $subject = factory(Subject::class)->make([
            'title' => null,
            'subtitle' => 'subject subtitle',
            'description' => 'Subject description',
            'category' => 'Test',
            'cover_image' => $photo
        ]);

        $response = $this->post('/subjects', $subject->toArray())
                                            ->assertSessionHasErrors(('title'));

       $this->assertEquals(0, Subject::count());
    }

    /** @test */
    public function a_subtile_is_not_required_to_store_a_subject()
    {
        $photo = UploadedFile::fake()->image('photo.jpg');
        $subject = factory(Subject::class)->make([
            'title' => 'Subject title',
            'subtitle' => null,
            'description' => 'Subject description',
            'category' => 'Test',
            'cover_image' => $photo
        ]);

        $response = $this->post('/subjects', $subject->toArray())
                                            ->assertSessionHasNoErrors();

       $this->assertEquals(1, Subject::count());
    }

    /** @test */
    public function a_description_is_required_to_store_a_subject()
    {
        $photo = UploadedFile::fake()->image('photo.jpg');
        $subject = factory(Subject::class)->make([
            'title' => 'Subject title',
            'subtitle' => 'subject subtitle',
            'description' => null,
            'category' => 'Test',
            'cover_image' => $photo
        ]);

        $response = $this->post('/subjects', $subject->toArray())
                                            ->assertSessionHasErrors(('description'));

       $this->assertEquals(0, Subject::count());
    }

    /** @test */
    public function a_category_is_required_to_store_a_subject()
    {
        $photo = UploadedFile::fake()->image('photo.jpg');
        $subject = factory(Subject::class)->make([
            'title' => 'Subject title',
            'subtitle' => 'subject subtitle',
            'description' => 'Subject description',
            'category' => null,
            'cover_image' => $photo
        ]);

        $response = $this->post('/subjects', $subject->toArray())
                                            ->assertSessionHasErrors(('category'));

       $this->assertEquals(0, Subject::count());
    }
}
