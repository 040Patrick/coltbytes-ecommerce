<?php
declare(strict_types=1);
namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Return user Orders view
     */
    public function index(): View
    {
        $orders = Auth::user()->orders()->with('orderItems')->get();

        return view('order.index', ['title' => 'My orders', 'orders' => $orders]);
    }
}
