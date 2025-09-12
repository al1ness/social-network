<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::all();
        $users = User::factory(20)->create();

        foreach ($users as $user) {
            $roleIds = $roles->random(fake()->numberBetween(1, 2))->pluck('id');
            $user->roles()->sync($roleIds);
        }
    }
}
