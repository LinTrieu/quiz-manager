<?php

namespace Tests\Feature;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Mockery;

class QuizTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCanViewQuizList(): void
    {
        $this->loginWithFakeUser();

        factory(Quiz::class)->create([
            'id' => 1,
        ]);

        $response = $this->get('/quiz/1');

        $response->assertSuccessful();
        $response->assertViewIs('quiz.quiz');
    }

    public function testUserCannotViewQuizWhenGuest(): void
    {
        factory(Quiz::class)->create([
            'id' => 1,
        ]);

        $response = $this->get('/quiz/1');

        $response->assertRedirect('/login');
        $this->assertGuest();
    }

    public function testUserOnlySeesQuestionsBelongingToAQuiz(): void
    {
        $this->loginWithFakeUser();
        $quizOne = factory(Quiz::class)->create([
            'id' => 1,
            'title' => 'Geography Quiz',
        ]);

        $quizTwo = factory(Quiz::class)->create([
            'id' => 2,
            'title' => 'Maths Quiz',
        ]);

        $questionQuizOne = factory(Question::class)->create([
            'quiz_id' => 1,
        ]);
        $questionQuizTwo = factory(Question::class)->create([
            'quiz_id' => 2,
        ]);

        $response = $this->get('/quiz/1');
        $response->assertSuccessful();

        $response->assertSee($questionQuizOne->description);
        $response->assertDontSee($questionQuizTwo->description);
    }

}
