<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $roles = DB::table('roles')->pluck('id', 'name');
        $permissions = DB::table('permissions')->get();

        $pivot = [];

        foreach ($permissions as $permission) {
            $pivot[] = [
                'role_id'       => $roles['admin'],
                'permission_id' => $permission->id,
                'created_at'    => $now,
                'updated_at'    => $now,
            ];

            if ($permission->entity === 'posts') {
                $pivot[] = [
                    'role_id'       => $roles['moderator_posts'],
                    'permission_id' => $permission->id,
                    'created_at'    => $now,
                    'updated_at'    => $now,
                ];
            }

            if ($permission->entity === 'videos') {
                $pivot[] = [
                    'role_id'       => $roles['moderator_videos'],
                    'permission_id' => $permission->id,
                    'created_at'    => $now,
                    'updated_at'    => $now,
                ];
            }

            if ($permission->action === 'show') {
                $pivot[] = [
                    'role_id'       => $roles['user'],
                    'permission_id' => $permission->id,
                    'created_at'    => $now,
                    'updated_at'    => $now,
                ];
            }
        }

        DB::table('permission_role')->insert($pivot);
    }
}
