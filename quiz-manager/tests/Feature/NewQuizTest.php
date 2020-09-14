<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewQuizTest extends TestCase
{
    use RefreshDatabase;

    public function testEditUserCanViewNewQuizForm(): void
    {
        $this->loginWithEditUser();
        $response = $this->get('/quiz/create');

        $response->assertSuccessful();
        $response->assertViewIs('quiz.new_quiz');
    }

    public function testRestrictedUserCannotViewNewQuizForm(): void
    {
        $this->loginWithRestrictedUser();
        $response = $this->get('/quiz/create');

        $response->assertStatus(302);
        $response->assertRedirect('/quiz');
    }

    public function testEditUserCanCreateNewQuiz(): void
{
    $this->loginWithEditUser();
    $response = $this->post('/quiz/store', [
        'title' => 'European Geography',
    ]);

    $response->assertSeeText('European Geography');
}
}
