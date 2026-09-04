<?php

namespace App\Providers;

use App\Contracts\ProductImageServiceInteraface;
use App\Services\ProductImageService;
use Illuminate\Support\ServiceProvider;

class ProductProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProductImageServiceInteraface::class, ProductImageService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
