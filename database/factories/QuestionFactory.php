<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $quizIDS = DB::table('quiz')->pluck('id');
        Log::debug($quizIDS);
     
        return [
            'description' => $this->faker->sentence . '?',
            'quiz_id' => $this->faker->randomElement($quizIDS),
            'answer_key' => $this->faker->randomElement(['A','B','C','D','E']),
            'option_a' => $this->faker->word,
            'option_b' => $this->faker->word,
            'option_c' => $this->faker->word,
            'option_d' => $this->faker->word,
            'option_e' => $this->faker->word,
        ];
    }
}
