<?php

namespace App\Providers;

use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryEloquent;
use App\Repositories\City\CityRepository;
use App\Repositories\City\CityRepositoryEloquent;
use App\Repositories\District\DistrictRepository;
use App\Repositories\District\DistrictRepositoryEloquent;
use App\Repositories\Notify\NotifyRepository;
use App\Repositories\Notify\NotifyRepositoryEloquent;
use App\Repositories\Product\ProductRepository;
use App\Repositories\Product\ProductRepositoryEloquent;
use App\Repositories\Image\ImageRepository;
use App\Repositories\Image\ImageRepositoryEloquent;
use App\Repositories\ProductVariant\ProductVariantRepository;
use App\Repositories\ProductVariant\ProductVariantRepositoryEloquent;
use App\Repositories\Store\StoreRepository;
use App\Repositories\Store\StoreRepositoryEloquent;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(CityRepository::class, CityRepositoryEloquent::class);
        $this->app->singleton(DistrictRepository::class, DistrictRepositoryEloquent::class);
        $this->app->singleton(StoreRepository::class, StoreRepositoryEloquent::class);
        $this->app->singleton(UserRepository::class, UserRepositoryEloquent::class);
        $this->app->singleton(CategoryRepository::class, CategoryRepositoryEloquent::class);
        $this->app->singleton(ProductRepository::class, ProductRepositoryEloquent::class);
        $this->app->singleton(NotifyRepository::class, NotifyRepositoryEloquent::class);
        $this->app->singleton(ImageRepository::class, ImageRepositoryEloquent::class);
        $this->app->singleton(ProductVariantRepository::class, ProductVariantRepositoryEloquent::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
