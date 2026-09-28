<?php
declare(strict_types=1);
namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StripeWebhookController extends Controller
{
    public function handle(Request $request): JsonResponse
    {
        $payload = $request->getContent();
        $sigheader = $request->header('stripe-signature');
        $key = config('services.stripe.webhook_secret');

        $event = \Stripe\Webhook::constructEvent($payload, $sigheader, $key);

        switch ($event->type)
        {
            case 'checkout.session.completed':

                $order = Order::find($event->data->object->metadata->order_id);

                if($order)
                {
                    $order->update([
                        'status' => 'paid'
                    ]);
                }

                break;

            case 'checkout.session.expired':

                $order = Order::find($event->data->object->metadata->order_id);

                if($order)
                {
                    $order->update([
                        'status' => 'expire'
                    ]);
                }
                
                break;
        }

        return response()->json(['status' => 'success']);
    }
}