<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        $user = [
//            'name' => 'user',
//            'email' => 'user@mail.com',
//            'password' => Hash::make('secret123')
//        ];
//
//        $user = User::firstOrCreate(['email' => $user['email']], $user);
//
//        $user->profile()->create();

        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            RolePermissionSeeder::class,
            UserSeeder::class,
            ProfileSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            PostSeeder::class,
            //LikeSeeder::class,
            CommentSeeder::class,
            //FollowSeeder::class,
            ChatSeeder::class,
            MessageSeeder::class,
            GroupSeeder::class
        ]);
    }
}
