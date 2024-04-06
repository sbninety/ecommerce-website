<?php

namespace App\Providers;

use App\Services\Category\CategoryService;
use App\Services\Category\CategoryServiceEloquent;
use App\Services\City\CityService;
use App\Services\City\CityServiceEloquent;
use App\Services\District\DistrictService;
use App\Services\District\DistrictServiceEloquent;
use App\Services\Notify\NotifyService;
use App\Services\Notify\NotifyServiceEloquent;
use App\Services\Product\ProductService;
use App\Services\Product\ProductServiceEloquent;
use App\Services\Image\ImageService;
use App\Services\Image\ImageServiceEloquent;
use App\Services\ProductVariant\ProductVariantService;
use App\Services\ProductVariant\ProductVariantServiceEloquent;
use App\Services\Store\StoreService;
use App\Services\Store\StoreServiceEloquent;
use App\Services\User\UserService;
use App\Services\User\UserServiceEloquent;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(CityService::class, CityServiceEloquent::class);
        $this->app->singleton(DistrictService::class, DistrictServiceEloquent::class);
        $this->app->singleton(StoreService::class, StoreServiceEloquent::class);
        $this->app->singleton(UserService::class, UserServiceEloquent::class);
        $this->app->singleton(CategoryService::class, CategoryServiceEloquent::class);
        $this->app->singleton(ProductService::class, ProductServiceEloquent::class);
        $this->app->singleton(NotifyService::class, NotifyServiceEloquent::class);
        $this->app->singleton(ImageService::class, ImageServiceEloquent::class);
        $this->app->singleton(ProductVariantService::class, ProductVariantServiceEloquent::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
