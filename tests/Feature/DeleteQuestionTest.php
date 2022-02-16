<?php

namespace Tests\Feature;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteQuestionTest extends TestCase
{
    use RefreshDatabase;

    public function testEditUserCanDeleteAQuestion(): void
    {
        $this->loginWithEditUser();

        $quiz = Quiz::factory()->create();
        
        $question = Question::factory()->create([
            'quiz_id' => $quiz->id,
            'id' => 1,
        ]);

        $response = $this->delete('/question/'.$question->id);

        $response->assertStatus(302);
        $response->assertRedirect('/quiz/'.$quiz->id);
        $this->get('/quiz/'.$quiz->id)->assertDontSeeText($question->description);
        $this->assertDatabaseMissing('question', ['id' => $question->id]);
    }

    public function testRestrictedUserCannotDeleteAQuestion(): void
    {
        $this->loginWithRestrictedUser();

        $quiz = Quiz::factory()->create();

        $question = Question::factory()->create([
            'quiz_id' => $quiz->id,
            'id' => 1,
        ]);

        $response = $this->delete('/question/'.$question->id);

        $response->assertStatus(302);
        $response->assertRedirect('/quiz/'.$quiz->id);
        $this->get('/quiz/'.$quiz->id)->assertSeeText($question->description);
        $this->assertDatabaseHas('question', ['id' => $question->id]);
    }

    public function testViewUserCannotDeleteAQuestion(): void
    {
        $this->loginWithViewUser();

        $quiz = Quiz::factory()->create();

        $question = Question::factory()->create([
            'quiz_id' => $quiz->id,
            'id' => 1,
        ]);

        $response = $this->delete('/question/'.$question->id);

        $response->assertStatus(302);
        $response->assertRedirect('/quiz/'.$quiz->id);
        $this->get('/quiz/'.$quiz->id)->assertSeeText($question->description);
        $this->assertDatabaseHas('question', ['id' => $question->id]);
    }
}
