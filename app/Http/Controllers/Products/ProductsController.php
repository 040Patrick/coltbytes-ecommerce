<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class ProductsController extends Controller
{
    /**
     * Show product
     */
    public function show(Product $product): View
    {
        return view('products.show', [
            'title' => 'product',
            'product' => $product
        ]);
    }
}