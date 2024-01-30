<?php

namespace Database\Factories;

use App\Models\BoardGroup;
use App\Models\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $name = fake()->words(fake()->numberBetween(1, 3), true);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
        ];
    }
}
