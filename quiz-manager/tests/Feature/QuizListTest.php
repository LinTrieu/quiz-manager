<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuizListTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCanViewAListOfAllQuizzes(): void
    {
        $this->loginWithFakeUser();

    }

    public function testUserCannotViewQuizzesWhenGuest(): void
    {
    }


}
