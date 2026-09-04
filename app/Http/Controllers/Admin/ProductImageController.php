<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\ProductImageServiceInteraface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductImageRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;

class ProductImageController extends Controller
{
    use AuthorizesRequests;

    public function __construct(public ProductImageServiceInteraface $productImage) { }

    /**
     * Store images
     */
    public function store(StoreProductImageRequest $request, Product $product)
    {
        $this->productImage->store($request, $product);

        return back()->with(['image' => 'New image had been added.']);
    }

    /**
     * Delete images
     */
    
    public function destroy(ProductImage $image)
    {
        dd('image delete');
        //$this->authorize('imageDelete', $image);

        $this->productImage->delete($image);

        return back();
    }
}
