<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Profile;

class ProfileService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function update(Profile $profile, array $data): Profile
    {
        $profile->update($data);
        return $profile->refresh();
    }
}
