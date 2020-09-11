<?php

namespace Tests\Feature;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewQuizTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCanViewNewQuizForm(): void
    {
        $this->loginWithRestrictedUser();
        $response = $this->get('/quiz/create');

        $response->assertSuccessful();
        $response->assertViewIs('quiz.new_quiz');
    }

//    public function testUserCannotViewQuizzesWhenGuest(): void
//    {
//        $response = $this->get('/quiz');
//
//        $response->assertRedirect('/login');
//        $this->assertGuest();
//    }
}
