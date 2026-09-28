<?php
declare(strict_types=1);
namespace App\Policies;

use App\Models\Address;
use App\Models\User;

class AddressPolicy
{
    /**
     * Update address if user.id === addresses.user_id
     */
    public function update(User $user, Address $address)
    {
        return $user->id === $address->user_id;
    }
}
