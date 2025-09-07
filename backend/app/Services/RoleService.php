<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Role;

class RoleService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function update(Role $role, array $data): Role
    {
        $role->update($data);
        return $role->refresh();
    }
}
