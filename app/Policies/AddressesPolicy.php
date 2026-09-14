<?php
declare(strict_types=1);
namespace App\Policies;

use App\Models\Address;
use App\Models\User;

class AddressesPolicy
{
    /**
     * Update address if user.id === addresses.user_id
     */
    public function update(User $user, Address $addresses)
    {
        return $user->id === $addresses->user_id;
    }

    /**
     * Delete address if user.id === addresses.user_id;
     */

    public function delete(User $user, Address $addresses)
    {
        return $user->id === $addresses->user_id;
    }
}
