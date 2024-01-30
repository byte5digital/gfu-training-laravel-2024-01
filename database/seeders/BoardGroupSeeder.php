<?php

namespace Database\Seeders;

use App\Models\BoardGroup;
use Illuminate\Database\Seeder;

class BoardGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BoardGroup::factory()
            ->count(5)
            ->hasBoards(fake()->numberBetween(3, 8))
            ->create();

    }
}
