<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'owner_id' => Profile::inRandomOrder()->first()->id,
            'title' => fake()->unique()->word(),
            'description' => fake()->realTextBetween(50, 150),
            'avatar_url' => fake()->imageUrl(),
        ];
    }
}
