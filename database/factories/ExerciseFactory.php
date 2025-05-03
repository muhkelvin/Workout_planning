<?php

namespace Database\Factories;

use App\Models\Workout;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Exercise>
 */
class ExerciseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'workout_id'  => Workout::factory(), // generate workout baru jika belum ada
            'name'        => $this->faker->word,
            'sets'        => $this->faker->numberBetween(1, 5),
            'repetitions' => $this->faker->numberBetween(5, 15),
            'weight'      => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}
