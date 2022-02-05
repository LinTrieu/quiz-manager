<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    const NUMBER_OF_QUIZZES = 10;

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

        // laravel 8 upgrade
        Quiz::factory()->count(self::NUMBER_OF_QUIZZES)->create();
        
        // laravel 7 deprecated
        // factory(Quiz::class, self::NUMBER_OF_QUIZZES)->create();
    }
}
