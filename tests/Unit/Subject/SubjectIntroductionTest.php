<?php

namespace Tests\Unit;

use Tests\TestCase;
use Faker\Factory as Faker;
use App\Models\SubjectIntroduction;

class SubjectIntroductionTest extends TestCase
{
    /** @test */
    public function can_create_subject_introduction()
    {
        $subjectIntroduction = SubjectIntroduction::factory()->create();
        $introductions = SubjectIntroduction::all()->last();

        $this->assertEquals($subjectIntroduction->id, $introductions->id);
    }
}
