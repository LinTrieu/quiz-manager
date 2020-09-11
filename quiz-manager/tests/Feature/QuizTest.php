<?php

namespace Tests\Feature;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

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
        $response->assertViewIs('quiz.quiz');
        $response->assertSuccessful();

        $response->assertSee($questionQuizOne->description);
        $response->assertDontSee($questionQuizTwo->description);
    }

    // fails as the assertion depends on browser? INVESTIGATE how to test this...
//    public function testAnswersAreHiddenToUserByDefault(): void
//    {
//        $this->loginWithFakeUser();
//
//        $quiz = factory(Quiz::class)->create([
//            'id' => 1,
//        ]);
//
//        $questions = factory(Question::class, 10)->create([
//            'quiz_id' => 1,
//        ]);
//
//        $response = $this->get('/quiz/1');
//        $response->assertDontSeeText('Answer: ', false);
//    }

    public function testRestrictedUserCannotViewAnswers(): void
    {
        $this->loginWithRestrictedUser();
        factory(Quiz::class)->create();
        factory(Question::class, 10)->create([
            'quiz_id' => 1,
        ]);

        $response = $this->get('/quiz/1');

        $response->assertSuccessful();
        $response->assertDontSeeText('Options:');
    }

    public function testViewUserCanViewAnswers(): void
    {
        $this->loginWithViewUser();
        factory(Quiz::class)->create();
        factory(Question::class, 10)->create([
            'quiz_id' => 1,
        ]);

        $response = $this->get('/quiz/1');
        $response->assertSuccessful();

        $response->assertSeeText('Options:');
    }

    public function testEditUserCanViewAnswers(): void
    {
        $this->loginWithEditUser();
        factory(Quiz::class)->create();
        factory(Question::class, 10)->create([
            'quiz_id' => 1,
        ]);

        $response = $this->get('/quiz/1');
        $response->assertSuccessful();

        $response->assertSeeText('Options:');
    }


    public function testRestrictedUserCannotSelectRevealAnswers(): void
    {
        $this->loginWithRestrictedUser();
        factory(Quiz::class)->create();
        factory(Question::class, 10)->create([
            'quiz_id' => 1,
        ]);

        $response = $this->get('/quiz/1');

        $response->assertSuccessful();
        $response->assertDontSeeText('Reveal Answers');
    }

    public function testEditUserCanSelectRevealAnswers(): void
    {
        $this->loginWithEditUser();
        factory(Quiz::class)->create();
        factory(Question::class, 10)->create([
            'quiz_id' => 1,
        ]);

        $response = $this->get('/quiz/1');

        $response->assertSuccessful();
        $response->assertSeeText('Reveal Answers');
    }

}
