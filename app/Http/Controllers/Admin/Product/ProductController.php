<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    use AuthorizesRequests;
    /**
     * Return admin product index
     */
    public function index(): View
    {
        return view('admin.product.index', ['title' => 'Admin Products','products' => Product::all()]);
    }

    /**
     * Create a product
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $data = $request->validated();

        Auth::user()->products()->create($data);

        return back()->with(['product' => 'New product has been created.']);
    }

    /**
     * Update a product
     */
    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $data = $request->validated();

        $product->update($data);

        return back()->with(['product' => "Product #{$product->id} successfully updated."]);
    }

    /**
     * Delete product
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return back()->with(['product' => "Product #{$product->id} successfully deleted."]);
    }
}
