<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\User;

class ProductPolicy
{
    /**
     * Update product policy.
     */
    public function update(User $user, Product $product): bool
    {
        return $user->id === $product->user_id;
    }

    /**
     * Delete product Policy
     */
    public function delete(User $user, Product $product): bool
    {
        return $user->id === $product->user_id;
    }

    public function imageDelete(User $user, ProductImage $image): bool
    {
        return $user->products()->whereKey($image->product_id)->exists();
    }
}
