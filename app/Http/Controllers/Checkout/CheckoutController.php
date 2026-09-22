<?php
declare(strict_types=1);
namespace App\Http\Controllers\Checkout;

use App\Contracts\StoreCheckoutServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Checkout\StoreCheckoutRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    /**
     * StoreCheckoutService Resolved 
     */
    public function __construct(private StoreCheckoutServiceInterface $checkout) { }

    public function store(StoreCheckoutRequest $request, Product $product): RedirectResponse
    {
        $data = $request->validated();

        // Order //
        $order = Auth::user()->orders()->create([
            'address_id' => $data['address_id'],
            'status' => 'pending',
            'total' => $product->price * $data['quantity']
        ]);

        $order->orderItems()->create([
            'product_id' => $product->id,
            'quantity' => $data['quantity'],
            'price' => $product->price * $data['quantity']
        ]);

        // Checkout //
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card', 'boleto'],
        'metadata' => [$order->id],
        'line_items' => [[
            'price_data' => [
            'currency' => 'brl',
            'unit_amount' => (int) $product->price * 100,
            'product_data' => [
                'name' => $product->name,
            ],
            ],
            'quantity' => $data['quantity'],
        ]],
        'mode' => 'payment',
        'success_url' => route('checkout.success', $order),
        'cancel_url' => route('checkout.cancel', $order),
        ]);


        return redirect()->away($session->url);
    }

    /**
     * Checkout Success 
     */
    public function success(Order $order): View
    {
        return view('checkout.success', ['title' => 'success', 'order' => $order]);
    }

    /**
    * Checkout Cancel 
    */
    public function Cancel(Order $order): View
    {
        return view('checkout.cancel', ['title' => 'Cancel', 'order' => $order]);
    }
}
