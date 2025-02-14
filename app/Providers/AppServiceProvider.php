<?php

namespace App\Providers;
use Modules\ClientManagement\app\Repositaries\ClientInterface;
use Modules\ClientManagement\app\Repositaries\ClientImplementations;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ClientInterface::class, ClientImplementations::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
