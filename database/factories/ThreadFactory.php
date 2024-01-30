<?php

namespace Database\Factories;

use App\Models\Board;
use App\Models\Thread;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Thread>
 */
class ThreadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'board_id'      => Board::inRandomOrder()->first()->getKey(),
            'title'         => fake()->words(fake()->numberBetween(3, 5), true),
            'content'       => fake()->paragraphs(fake()->numberBetween(3, 7), true),
            'deleted_at'    => fake()->randomElement([true, false]) ? now() : null,
        ];
    }
}
