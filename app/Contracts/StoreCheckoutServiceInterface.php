<?php 
declare(strict_types=1);
namespace App\Contracts;

use App\Http\Requests\Checkout\StoreCheckoutRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

Interface StoreCheckoutServiceInterface
{
    public function store(StoreCheckoutRequest $request, Product $product);
}