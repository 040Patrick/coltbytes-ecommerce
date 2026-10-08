<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use AuthorizesRequests;
    /**
     * Return order index 
     */
    public function index(Request $request): View
    {
        $orders = Order::when($request->status, function($query, $status) {
            $query->where('status', '=', "$status");
        })->latest()->with(['orderItems.product', 'user'])->get();

        return view('admin.order.index', ['title' => 'Admin Orders', 'orders' => $orders]);
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
