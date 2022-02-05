<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    private const NUMBER_OF_QUESTIONS = 100;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        if (Question::count()) {
            echo "Skipping Question; data already exists\n";
            return;
        }

        Question::factory()->count(self::NUMBER_OF_QUESTIONS)->create();
        // factory(Question::class, self::NUMBER_OF_QUESTIONS)->create();
    }
}
