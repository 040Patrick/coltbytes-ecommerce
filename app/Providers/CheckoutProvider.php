<?php

namespace App\Providers;

use App\Contracts\CheckoutServiceInterface;
use App\Contracts\StoreCheckoutServiceInterface;
use App\Services\StoreCheckoutService;
use Illuminate\Support\ServiceProvider;

class CheckoutProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(StoreCheckoutServiceInterface::class, StoreCheckoutService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
