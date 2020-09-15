<?php

namespace Tests\Feature;

use App\Models\Quiz;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuizListTest extends TestCase
{
    use RefreshDatabase;

//    public function __construct()
//    {
//        parent::__construct();
//        // We have no interest in testing Eloquent
//        $this->mock = Mockery::mock('Eloquent', 'Quiz');
//    }
//
//    public function tearDown(): void
//    {
//        Mockery::close();
//    }

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

    public function testEditUserCanDeleteAQuiz(): void
    {
        $this->loginWithEditUser();

        $quiz = factory(Quiz::class)->create([
            'id' => $quiz_id = 1,
            'title' => 'Maths Quiz',
        ]);

        $response = $this->delete('/quiz/'.$quiz_id);

        $response->assertStatus(302);
        $response->assertRedirect('/quiz');
        $this->get('/quiz')->assertDontSeeText($quiz->title);
        $this->assertDatabaseMissing('quiz',['id' => $quiz->id]);
    }

    public function testViewUserCannotDeleteAQuiz(): void
    {
        $this->loginWithViewUser();

        $quiz = factory(Quiz::class)->create([
            'id' => $quiz_id = 1,
            'title' => 'English Quiz',
        ]);

        $response = $this->delete('/quiz/'.$quiz_id);

        $response->assertStatus(302);
        $response->assertRedirect('/quiz');
        $this->get('/quiz')->assertSeeText($quiz->title);
        $this->assertDatabaseHas('quiz',['id' => $quiz->id]);
    }


//    public function testAllQuizzesAreListedOnQuizList(): void
//    {
//        $this->mock
//            ->shouldReceive('all')
//            ->once()
//            ->andReturn('foo');
//
//        $this->app->instance('Quiz', $this->mock);
//        $this->get('/quiz');
//        $this->assertViewHas('quiz');
//        $this->assertDatabaseHas();
//    }
//
}
