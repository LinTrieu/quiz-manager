<?php

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    const NUMBER_OF_QUESTIONS = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Question::count()) {
            echo "Skipping Question; data already exists\n";
            return;
        }

        factory(Question::class, self::NUMBER_OF_QUESTIONS)->create();
    }
}
