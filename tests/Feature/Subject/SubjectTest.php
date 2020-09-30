<?php

namespace Tests\Unit;

use Tests\TestCase;
use Faker\Factory as Faker;
use App\Models\Subject;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubjectTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_subject_can_be_created()
    {
        // $this->withoutExceptionHandling();

        Storage::fake('images');

        $response = $this->post('/subject_submission', [
            'title' => 'Subject title',
            'subtitle' => 'subject subtitle',
            'description' => 'Subject description',
            'category' => 'Test',
            'cover_image' => UploadedFile::fake()->image('avatar.jpg')
        ]);

        // Storage::disk('images')->assertExists('image/'.$_SESSION['testing']);
        // $response->assertOk();
        $this->assertCount(1, Subject::all());
    }

    /** @test */
   // public function user_should_be_able_to_upload_csv_file()
   // {
   //     // If your route requires authenticated user
   //     $user = Factory('App\User')->create();
   //     $this->actingAs($user);
   //
   //     // Fake any disk here
   //     Storage::fake('local');
   //
   //     $filePath='/tmp/randomstring.csv';
   //
   //     // Create file
   //     file_put_contents($filePath, "HeaderA,HeaderB,HeaderC\n");
   //
   //     $this->postJson('/upload', [
   //         'file' => new UploadedFile($filePath,'test.csv', null, null, null, true),
   //     ])->assertStatus(200);
   //
   //     Storage::disk('local')->assertExists('test.csv');
   //  }
}
