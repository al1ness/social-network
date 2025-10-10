<?php

namespace Database\Seeders;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'user',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'moderator_posts',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'moderator_videos',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
