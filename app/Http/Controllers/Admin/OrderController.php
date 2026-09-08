<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::with(['orderItems.product', 'user',])->get();

        return view('admin.orders.index', ['title' => 'Admin Orders', 'orders' => $orders]);
    }
}
