<?php

namespace Database\Factories;

use App\Models\Board;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = fake()->words(fake()->numberBetween(3, 5), true);

        return [
            'board_id'      => Board::inRandomOrder()->first()->getKey(),
            'user_id'       => User::inRandomOrder()->first()->getKey(),
            'title'         => $title,
            'slug'          => Str::slug($title),
            'content'       => fake()->paragraphs(fake()->numberBetween(3, 7), true),
            'deleted_at'    => fake()->randomElement([true, false]) ? now() : null,
        ];
    }
}
