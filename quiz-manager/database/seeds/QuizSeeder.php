<?php

use App\Models\Quiz;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    const NUMBER_OF_QUIZZES = 5;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Quiz::count()) {
            echo "Skipping Quiz; data already exists\n";
            return;
        }

        factory(Quiz::class, self::NUMBER_OF_QUIZZES)->create();

    }
}
