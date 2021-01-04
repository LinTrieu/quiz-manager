<?php

namespace Tests\Feature;

use App\Models\Quiz;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateQuestionTest extends TestCase
{
    use RefreshDatabase;

    public function testEditUserCanViewNewQuestionForm(): void
    {
        $this->loginWithEditUser();
        $quiz = factory(Quiz::class)->create();
        $response = $this->get('/question/create/' . $quiz->id);

        $response->assertSuccessful();
        $response->assertViewIs('question.new_question');
    }

    public function testViewUserCannotViewNewQuestionForm(): void
    {
        $this->loginWithViewUser();
        $quiz = factory(Quiz::class)->create();
        $response = $this->get('/question/create/' . $quiz->id);

        $response->assertStatus(302);
        $response->assertRedirect('/quiz/' . $quiz->id);
    }

    public function testEditUserCanCreateANewQuestion(): void
    {
        $this->loginWithEditUser();
        $quiz = factory(Quiz::class)->create();

        $response = $this->post('/question', [
            'quiz_id' => $quiz->id,
            'description' => 'What is the capital of Thailand',
            'option_a' => 'Kuala Lumpur',
            'option_b' => 'Phuket',
            'option_c' => 'Bangkok',
            'answer_key' => 'C',
        ]);

        $response->assertSeeText('What is the capital of Thailand');
    }
}
