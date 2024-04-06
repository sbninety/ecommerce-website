<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Store;
use App\Observers\ProductObserver;
use App\Observers\StoreObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Store::observe(StoreObserver::class);
        Product::observe(ProductObserver::class);
    }
}
