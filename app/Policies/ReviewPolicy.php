<?php
declare(strict_types=1);
namespace App\Policies;

use App\Models\Order;
use App\Models\User;

class ReviewPolicy
{
    /**
     * Create a new policy instance.
     */
    public function review(User $user, Int $productId, Order $order): bool
    {
        return $user->id === $order->user_id 
                && $order->status === 'shipped' 
                && !$user->reviews()->where('product_id', $productId)->where('order_id', $order->id)->exists();
    }
}
