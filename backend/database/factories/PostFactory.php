<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'profile_id' => Profile::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'title' => fake()->realTextBetween(30, 100),
            'body' => fake()->realTextBetween(150, 500),
            'published_at' => fake()->dateTime(),
            'views' => fake()->numberBetween(10, 5000),
            'status' => fake()->numberBetween(1, 4),
        ];
    }
}
