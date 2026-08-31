<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function update(User $user, User $model): bool
    {
        return $user->id === $model->id;
    }
}
