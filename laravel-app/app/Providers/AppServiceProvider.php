<?php
namespace App\Providers;

use App\Services\F5\Contracts\F5ClientInterface;
use App\Services\F5\Clients\MockF5Client;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(F5ClientInterface::class, function () {
        return new MockF5Client();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
