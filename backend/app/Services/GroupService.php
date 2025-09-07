<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Group;

class GroupService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function update(Group $group, array $data): Group
    {
        $group->update($data);
        return $group->refresh();
    }
}
