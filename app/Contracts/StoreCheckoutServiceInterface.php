<?php 
declare(strict_types=1);
namespace App\Contracts;

use App\Http\Requests\Checkout\StoreCheckoutRequest;
use App\Models\Product;

Interface StoreCheckoutServiceInterface
{
    public function store(StoreCheckoutRequest $request, Product $product);
}