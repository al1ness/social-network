<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $entities = ['posts', 'videos'];
        $actions = ['store', 'show', 'update', 'delete'];

        $permissions = [];

        foreach ($entities as $entity) {
            foreach ($actions as $action) {
                $permissions[] = [
                    'name'       => "{$action}_{$entity}",
                    'entity'     => $entity,
                    'action'     => $action,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        DB::table('permissions')->insert($permissions);
    }
}
