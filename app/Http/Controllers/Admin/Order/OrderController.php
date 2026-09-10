<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    /**
     * Return order index 
     */
    public function index(): View
    {
        $orders = Order::with(['orderItems.product', 'user',])->get();

        return view('admin.orders.index', ['title' => 'Admin Orders', 'orders' => $orders]);
    }

    /**
     * Update order status
     */
    public function update(UpdateOrderRequest $request, Order $order): RedirectResponse
    {
        $data = $request->validated();

        $order->update($data);

        return back()->with(['order' => "Order #{$order->id} has been updated."]);
    }
}
