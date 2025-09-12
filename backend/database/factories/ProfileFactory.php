<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'user_id' => null,
            'avatar_url' => fake()->imageUrl(),
            'phone' => fake()->phoneNumber(),
            'birthdate' => fake()->date(),
            'location' => fake()->city(),
            'social_links' => null,
        ];
    }
}
