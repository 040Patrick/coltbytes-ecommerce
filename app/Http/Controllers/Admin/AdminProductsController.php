<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminProductsController extends Controller
{
    public function index(): View
    {
        return view('admin.products.index', [
            'title' => 'Admin Products',
            'products' => Product::all()
        ]);
    }
}
