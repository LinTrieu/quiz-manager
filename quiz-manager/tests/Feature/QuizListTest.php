<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Mockery;

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

    //testDatabaseHasTheQuizzes

//$this->assertDatabaseHas();
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
//    }
//
//    public function testEachQuizInListHasALink(): void
//    {}
}
