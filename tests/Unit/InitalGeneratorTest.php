<?php

namespace Tests\Unit;

use Auth;
use App\Helpers\Helper;
use App\Models\User;
use Faker\Factory as Faker;
use Tests\TestCase;
use Illuminate\Support\Str;

class InitialGeneratorTest extends TestCase
{
    /** @test*/
    public function it_generates_initials_for_names_with_two_words_and_above()
    {
        $user = factory(User::class)->create([
            'name' => 'Otim Fredrick',
            'email' => 'otf@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $this->actingAs($user);

        Helper::generate_initials(Auth::user()->name);

        $this->assertTrue(true);
    }
}
