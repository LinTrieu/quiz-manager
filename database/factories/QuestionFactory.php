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
        'description' => $faker->sentence . '?',
        'quiz_id' => Quiz::all()->random()->id,
        'answer_key' => $faker->randomElement(['A','B','C','D','E']),
        'option_a' => $faker->word,
        'option_b' => $faker->word,
        'option_c' => $faker->word,
        'option_d' => $faker->word,
        'option_e' => $faker->word,
    ];
});
