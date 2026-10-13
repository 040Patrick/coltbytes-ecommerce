<?php
declare(strict_types=1);
namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    /**
     * Show an specific product
     */
    public function show(Product $product): View
    {
        $product = $product->load(['reviews.user']);
        
        return view('product.show', ['title' => 'Product', 'product' => $product]);
    }
}