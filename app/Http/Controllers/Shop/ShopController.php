<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Products;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Return show index view
     */
    public function index(Request $request): View
    {
        $products = Product::query()->when($request->search, function ($query, $search) 
        {
            $query->where('name', 'like', "%{$search}%");
        })->paginate(10);


        return view('shop.index', [
            'title' => 'Shop',
            'products' => $products
        ]);
    }
}
