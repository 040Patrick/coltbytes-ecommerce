<?php
declare(strict_types=1);
namespace App\Providers;

use App\Contracts\ProfileServiceInterface;
use App\Services\UpdateProfileService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class ProfileServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProfileServiceInterface::class, UpdateProfileService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        foreach(['profile'] as $throttle)
        {
            RateLimiter::for($throttle, function (Request $request) {
                Limit::perMinute(1);
            }); 
        }
    }
}
