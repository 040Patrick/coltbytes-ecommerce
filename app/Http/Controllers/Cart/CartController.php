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

        $cart[$product->id] = ($cart[$product->id] ?? 0) + $data['quantity'];

        session()->put('cart', $cart);

        return back()->withFragment('cart')->with(['success' => "{$product->name} added to cart."]);
    }

    /** 
     * Remove a product from cart
     */
    public function destroy(Product $product): RedirectResponse
    {
        $cart = session()->get('cart', []);

        unset($cart[$product->id]);
        
        session()->put('cart', $cart);

        return back()->with(['success' => "{$product->name} removed from cart"]);
    }

    /**
     * Increase the quantity of an specific product by its id
     */
    public function plusOne(Product $product): RedirectResponse
    {
        $cart = session()->get('cart', []);

        $cart[$product->id]++;

        session()->put('cart', $cart);

        return back();
    }

    /**
     * Decrese the quantity of an specific product by its id
     */
    public function minusOne(Product $product): RedirectResponse
    {
        $cart = session()->get('cart', []);

        if(!isset($cart[$product->id]))
        {
            return back();
        }
        if($cart[$product->id] === 1)
        {
            unset($cart[$product->id]);
        }
        else 
        {
            $cart[$product->id]--;
        }

        session()->put('cart', $cart);

        return back();
    }

    public function removeAll(): RedirectResponse
    {
        session()->put('cart', []);
        
        return back();
    }
}
