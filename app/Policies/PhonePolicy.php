<?php

namespace App\Policies;

use App\Models\Phone;
use App\Models\User;

class PhonePolicy
{
    /**
     * Create a new policy instance.
     */
    public function update(User $user, Phone $phone): bool
    {
        return $user->id === $phone->user_id;
    }
}
