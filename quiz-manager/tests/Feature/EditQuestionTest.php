<?php

namespace Tests\Feature;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EditQuestionTest extends TestCase
{
    use RefreshDatabase;

    public function testEditUserCanViewEditQuestionForm(): void
    {
        $this->loginWithEditUser();
        $quiz = factory(Quiz::class)->create();
        $question = factory(Question::class)->create([
            'quiz_id' => $quiz->id,
            'id' => 1,
        ]);

        $response = $this->get('/question/1/edit');

        $response->assertSuccessful();
        $response->assertViewIs('question.edit_question');
    }

    public function testViewUserCannotViewEditQuestionForm(): void
    {
        $this->loginWithViewUser();
        $quiz = factory(Quiz::class)->create();
        $question = factory(Question::class)->create([
            'quiz_id' => $quiz->id,
            'id' => 1,
        ]);

        $response = $this->get('/question/' . $question->id . '/edit');

        $response->assertStatus(302);
        $response->assertRedirect('/quiz/' . $quiz->id);
    }

    public function testEditUserCanUpdateAQuestion(): void
    {
        $this->loginWithEditUser();

        $quiz = factory(Quiz::class)->create();
        $question = factory(Question::class)->create([
            'description' => 'What is the Capital of the UK?',
            'quiz_id' => $quiz->id,
            'id' => 1,
        ]);

        $response = $this->put('/question/' . $question->id, [
            'description' => 'What is the Capital City of the United Kingdom?',
        ]);
        $response->assertSeeText('What is the Capital City of the United Kingdom?');
    }
}
