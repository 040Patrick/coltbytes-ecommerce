<?php 
declare(strict_types=1);
namespace App\Contracts;

use App\Http\Requests\Product\StoreProductImageRequest;
use App\Models\Product;
use App\Models\ProductImage;

Interface ProductImageServiceInteraface
{
    public function store(StoreProductImageRequest $request, Product $product): void;

    public function delete(ProductImage $image): void;
}