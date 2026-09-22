<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(): View
    {
        $orders = Auth::user()->orders()->with('orderItems')->get();

        return view('order.index', ['title' => 'My orders', 'orders' => $orders]);
    }
}
