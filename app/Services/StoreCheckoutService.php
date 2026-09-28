<?php 
declare(strict_types=1);
namespace App\Services;

use App\Contracts\StoreCheckoutServiceInterface;
use App\Http\Requests\Checkout\StoreCheckoutRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class StoreCheckoutService implements StoreCheckoutServiceInterface
{
    /**
     * Checkout service store 
     */
    public function store(StoreCheckoutRequest $request, Product $product)
    {
        
    }
}