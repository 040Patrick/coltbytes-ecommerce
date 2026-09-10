<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    /**
     * Update user policy.
     */
    public function update(User $user, User $model): bool
    {
        return $user->id === $model->id;
    }

    /**
     * Delete user policy.
     */
    public function delete(User $user, User $model): bool
    {
        return $user->id === $model->id;
    }
}
