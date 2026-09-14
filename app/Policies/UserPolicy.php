<?php
declare(strict_types=1);
namespace App\Policies;

use App\Models\User;

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
