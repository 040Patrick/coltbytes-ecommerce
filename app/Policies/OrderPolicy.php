<?php
declare(strict_types=1);
namespace App\Policies;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class OrderPolicy
{
    /**
     * Store review
     */
    public function store(User $user, Order $order): bool
    {
        return $user->id === $order->user_id && $order->status === 'shipped';
    }
}
