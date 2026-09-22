<?php

namespace App\Providers;

use App\Contracts\CheckoutServiceInterface;
use Illuminate\Support\ServiceProvider;

class CheckoutProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CheckoutServiceInterface::class,)
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
