<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminProductsController extends Controller
{
    use AuthorizesRequests;
    /**
     * Return admin product index
     */
    public function index(): View
    {
        return view('admin.products.index', [
            'title' => 'Admin Products',
            'products' => Product::all()
        ]);
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
        $this->authorize('update', $product);

        $data = $request->validated();

        $product->update($data);

        return back()->with(['product' => "Product #{$product->id} successfully updated."]);
    }

    /**
     * Delete product
     */
    public function destroy(Product $product): RedirectResponse
    {
        $this->authorize('delete', $product);

        $product->delete();

        return back()->with(['product' => "Product #{$product->id} successfully deleted."]);
    }
}
