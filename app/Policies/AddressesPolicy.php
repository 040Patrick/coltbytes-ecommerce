<?php

namespace App\Policies;

use App\Models\Addresses;
use App\Models\User;

class AddressesPolicy
{
    /**
     * Update address if user.id === addresses.user_id
     */
    public function update(User $user, Addresses $addresses)
    {
        return $user->id === $addresses->user_id;
    }

    /**
     * Delete address if user.id === addresses.user_id;
     */

    public function delete(User $user, Addresses $addresses)
    {
        return $user->id === $addresses->user_id;
    }
}
