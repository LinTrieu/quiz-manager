<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->sentence . '?',
            // hardcoded max for now. TODO: add faker generated random number between zero and the seeded number of quizzes
            'quiz_id' => rand(1,10),
            'answer_key' => $this->faker->randomElement(['A','B','C','D','E']),
            'option_a' => $this->faker->word,
            'option_b' => $this->faker->word,
            'option_c' => $this->faker->word,
            'option_d' => $this->faker->word,
            'option_e' => $this->faker->word,
        ];
    }
}
