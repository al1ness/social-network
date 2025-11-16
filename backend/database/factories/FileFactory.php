<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Message;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
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
            'fileable_type' => 'App\Models\Message',
            'fileable_id' => Message::inRandomOrder()->first()->id,
            'name' => $this->faker->word().'.'.$this->faker->fileExtension(),
            'file_path' => 'files/'.$this->faker->uuid().'.txt'
        ];
    }
}
