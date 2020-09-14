<?php

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    private const NUMBER_OF_QUESTIONS = 30;

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

        factory(Question::class, self::NUMBER_OF_QUESTIONS)->create();
    }
}
