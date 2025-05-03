<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Workout>
 */
class WorkoutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'      => User::factory(), // generate user baru jika belum ada
            'title'        => $this->faker->sentence,
            'scheduled_at' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'comment'      => $this->faker->optional()->paragraph,
        ];
    }
}
