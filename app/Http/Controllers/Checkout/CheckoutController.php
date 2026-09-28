<?php
declare(strict_types=1);
namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use App\Http\Requests\Checkout\StoreCheckoutRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Return checkout confirm view
     */
    public function index(Product $product): View
    {
        return view('checkout.index', ['title' => 'Checkout', 'product' => $product]);
    }

    /**
     * Checkout store
     */
    public function store(StoreCheckoutRequest $request, Product $product): RedirectResponse
    {
        $data = $request->validated();

        // Order 
        $order = Auth::user()->orders()->create([
            'address_id' => $data['address_id'],
            'status' => 'pending',
            'total' => $product->price * 1 // Quantity Here,
        ]);
    
        $order->orderItems()->create([
            'product_id' => $product->id,
            'quantity' => 1,
            'price' => $product->price
        ]);

        // Checkout 
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card', 'boleto'],
            'metadata' => ['order_id' => $order->id],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'brl',
                    'product_data' => [
                        'name' => $product->name,
                    ],
                    'unit_amount' => (int) ($product->price * 100),
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('checkout.success', $order),
            'cancel_url' => route('checkout.cancel', [$product, $order]),
        ]);


        return redirect()->away($session->url);
    }

    /**
     * Checkout success
     */
    public function success(Order $order): View
    {
        return view('checkout.success', ['title' => 'success', 'order' => $order]);
    }

    /**
     * Checkout cancel
     */
    public function cancel(Product $product, Order $order): View
    {
        return view('checkout.cancel', ['title' => 'cancelled', 'product' => $product, 'order' => $order]);
    }
}
