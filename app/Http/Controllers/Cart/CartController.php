<?php
declare(strict_types=1);
namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cart\CartStoreRequest;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    /**
     * Add a product to the cart
     */
    public function store(CartStoreRequest $request): RedirectResponse
    {   
        $data = $request->validated();

        $product = Product::findOrFail($data['product_id']);

        $cart = session('cart', []);

        $cart[$product->id] = ($cart[$product->id] ?? 0) + ($cart[$product->id] = $data['quantity']);

        session('cart', $cart);

        return back()->with(['success' => "{$product->name} added to cart."]);
    }
}
