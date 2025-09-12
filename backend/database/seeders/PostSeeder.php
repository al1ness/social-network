<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::all();
        $posts = Post::factory(50)->create();

        foreach ($posts as $post) {
            $tagIds = $tags->random(fake()->numberBetween(1, 5))->pluck('id');
            $post->tags()->sync($tagIds);
        }
    }
}
