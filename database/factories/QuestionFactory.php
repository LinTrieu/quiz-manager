<?php

/** @var Factory $factory */

use App\Models\Question;
use App\Models\Quiz;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Question::class, function (Faker $faker) {
    return [
        'description' => $this->faker->sentence . '?',
        'quiz_id' => Quiz::all()->random()->id,
        'answer_key' => $this->faker->randomElement(['A','B','C','D','E']),
        'option_a' => $this->faker->word,
        'option_b' => $this->faker->word,
        'option_c' => $this->faker->word,
        'option_d' => $this->faker->word,
        'option_e' => $this->faker->word,
    ];
});
