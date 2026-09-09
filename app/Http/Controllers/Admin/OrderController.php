<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

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
    public function update(Request $request, Order $order)
    {
        $data = $request->validate(['status' => ['required', 'string', 'in:pending,paid,shipped,completed,cancelled']]);

        $order->update([
            'status' => $data['status'],
        ]);

        return back()->with(['order' => "Order #{$order->id} has been updated."]);
    }
}
