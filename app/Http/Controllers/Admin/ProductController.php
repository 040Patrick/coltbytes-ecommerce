<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Override;

class ProductController extends Controller implements HasMiddleware
{
    /**
     * Middleware for specific routes
     */
    public static function middleware()
    {
        return [
            new Middleware('admin', except: ['show']),
        ];
    }

    /**
     * Show product
     */
    public function show(Product $product)
    {
        return view('products.show', [
            'title' => 'product',
            'product' => $product
        ]);
    }
}
