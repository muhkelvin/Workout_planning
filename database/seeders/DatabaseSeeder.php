<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Workout;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat 10 user, masing-masing dengan 1-3 workout, dan tiap workout memiliki 2-5 exercise
        User::factory(10)->create()->each(function ($user) {
            Workout::factory(rand(1, 3))->create(['user_id' => $user->id])
                ->each(function ($workout) {
                    Exercise::factory(rand(2, 5))->create(['workout_id' => $workout->id]);
                });
        });
    }
}
