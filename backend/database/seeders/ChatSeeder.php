<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profiles = Profile::all();
        $chats = Chat::factory(20)->create();

        foreach ($chats as $chat) {
            $profileIds = $profiles->random(fake()->numberBetween(1, 20))->pluck('id');
            $chat->profiles()->sync($profileIds);
        }
    }
}
