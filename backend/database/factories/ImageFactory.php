<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Post;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageableTypes = [Post::class, Profile::class, Group::class];
        $imageableType = $this->faker->randomElement($imageableTypes);

        return [
            'file_path' => 'images/'.$this->faker->uuid().'.jpg',
            'imageable_type' => $imageableType,
            'imageable_id' => $imageableType::inRandomOrder()->first()->id
        ];
    }
}
