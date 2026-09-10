<?php
declare(strict_types=1);
namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
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