<?php 
declare(strict_types=1);
namespace App\Services;

use App\Contracts\StoreCheckoutServiceInterface;
use App\Http\Requests\Checkout\StoreCheckoutRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;

class StoreCheckout implements StoreCheckoutServiceInterface
{
    
    public function store(StoreCheckoutRequest $request, Product $product)
    {

    }

    public function handle()
    {

    }
    
}