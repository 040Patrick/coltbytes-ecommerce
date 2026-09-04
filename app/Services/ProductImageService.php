<?php
declare(strict_types=1);
namespace App\Services;

use App\Contracts\ProductImageServiceInteraface;
use App\Http\Requests\Product\StoreProductImageRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductImageService implements ProductImageServiceInteraface
{
    /**
     * Store product images service
     */
    public function store(StoreProductImageRequest $request, Product $product): void
    {
        $data = $request->validated();

        if($request->hasFile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $path = $image->store('products', 'public');

                $product->images()->create([
                    'image' => $path
                ]);
            }
        }
    }

    
    /**
     * Delete product avatar 
     */
    public function delete(ProductImage $image): void
    {
        if($image->image && Storage::disk('public')->exists($image->image))
        {
            Storage::disk('public')->delete($image->image);
        }

        $image->delete();
    }
}