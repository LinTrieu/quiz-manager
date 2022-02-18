<?php

namespace Tests\Feature;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewQuizTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCanViewAQuiz(): void
    {
        $this->loginWithFakeUser();
        
        Quiz::factory()->create([
            'id' => 1,
        ]);

        $response = $this->get('/quiz/1');

        $response->assertSuccessful();
        $response->assertViewIs('quiz.quiz');
    }

    public function testUserCannotViewQuizWhenGuest(): void
    {
        Quiz::factory()->create([
            'id' => 1,
        ]);

        $response = $this->get('/quiz/1');

        $response->assertRedirect('/login');
        $this->assertGuest();
    }

    public function testUserOnlySeesQuestionsBelongingToAQuiz(): void
    {
        $this->loginWithFakeUser();
        $quizOne = Quiz::factory()->create([
            'id' => 1,
            'title' => 'Geography Quiz',
        ]);

        $quizTwo = Quiz::factory()->create([
            'id' => 2,
            'title' => 'Maths Quiz',
        ]);

        $questionQuizOne = Question::factory()->create([
            'quiz_id' => 1,
        ]);
        $questionQuizTwo =  Question::factory()->create([
            'quiz_id' => 2,
        ]);

        $response = $this->get('/quiz/1');
        $response->assertViewIs('quiz.quiz');
        $response->assertSuccessful();

        $response->assertSee($questionQuizOne->description);
        $response->assertDontSee($questionQuizTwo->description);
    }

    public function testRestrictedUserCannotViewAnswers(): void
    {
        $this->loginWithRestrictedUser();
        Quiz::factory()->create();
        Question::factory()->create([
            'quiz_id' => 1,
        ]);

        $response = $this->get('/quiz/1');

        $response->assertSuccessful();
        $response->assertDontSeeText('Options:');
    }

    public function testViewUserCanViewAnswers(): void
    {
        $this->loginWithViewUser();
        $questions = Quiz::factory()->create();
        Question::factory()->create([
            'quiz_id' => 1,
        ]);

        $response = $this->get('/quiz/1');
        $response->assertSeeText('Options:');
    }

    public function testEditUserCanViewAnswers(): void
    {
        $this->loginWithEditUser();
        Quiz::factory()->create();
        Question::factory()->create([
            'quiz_id' => 1,
        ]);

        $response = $this->get('/quiz/1');
        $response->assertSuccessful();
        $response->assertSeeText('Options:');
    }

    public function testRestrictedUserCannotSelectRevealAnswers(): void
    {
        $this->loginWithRestrictedUser();
        Quiz::factory()->create();
        Question::factory()->create([
            'quiz_id' => 1,
        ]);

        $response = $this->get('/quiz/1');

        $response->assertSuccessful();
        $response->assertDontSeeText('Reveal Answers');
    }

    public function testEditUserCanSelectRevealAnswers(): void
    {
        $this->loginWithEditUser();
        Quiz::factory()->create();
        Question::factory()->create([
            'quiz_id' => 1,
        ]);

        $response = $this->get('/quiz/1');

        $response->assertSuccessful();
        $response->assertSeeText('Reveal Answers');
    }
}
