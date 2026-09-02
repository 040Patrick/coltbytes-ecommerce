<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductImageRequest;
use App\Models\ProductImage;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductImageController extends Controller
{
    use AuthorizesRequests;

    /**
     * Store images
     */
    public function store(StoreProductImageRequest $request)
    {
        $data = $request->validated();

        dd($data);

        return back();
    }

    /**
     * Delete images
     */
    public function destroy(ProductImage $image)
    {
        $this->authorize('imageDelete', $image);

        $image->delete();

        return back();
    }
}
