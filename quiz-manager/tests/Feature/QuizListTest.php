<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuizListTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCanViewQuizList(): void
    {
        $this->loginWithFakeUser();
        $response = $this->get('/quiz');

        $response->assertSuccessful();
        $response->assertViewIs('quiz.quiz_list');
    }

    public function testUserCannotViewQuizzesWhenGuest(): void
    {
        $response = $this->get('/quiz');

        $response->assertRedirect('/login');
        $this->assertGuest();
    }

    public function testAllQuizzesAreListedOnQuizList(): void
    {}

    public function testEachQuizInListHasALink(): void
    {}
}
