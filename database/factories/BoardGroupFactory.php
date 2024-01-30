<?php

namespace Database\Factories;

use App\Models\BoardGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BoardGroup>
 */
class BoardGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(fake()->numberBetween(1, 3), true),
        ];
    }
}
