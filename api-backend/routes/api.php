<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\NotifyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->prefix('v1/')->group(function () {
    Route::get('notifies', [NotifyController::class, 'index']);

    Route::controller(StoreController::class)->prefix('store/{id}/')->group(function () {
        Route::get('', 'getGeneralInfo');
        Route::get('detail', 'edit');
        Route::put('', 'update');
        Route::get('sumary', 'sumary');
    });

    Route::controller(ProductController::class)->prefix('products/')->group(function () {
        Route::get('search', 'search');
        Route::get('store/{id}', 'index');
        Route::patch('{id}', 'updateStatus');
        Route::delete('{id}', 'destroy');
        Route::post('draft', 'draftCreate');
        Route::post('publish', 'publishCreate');
        Route::get('{id}/edit', 'edit');
        Route::put('{id}/draft', 'draftUpdate');
        Route::put('{id}/publish', 'publishUpdate');
        Route::get('{id}/images', 'getImages');
        Route::get('{id}/variants', 'getVariants');
    });
});

Route::prefix('v1/')->group(function () {
    Route::get('cities', [CityController::class, 'index']);

    Route::get('districts', [DistrictController::class, 'getDistrictByCityId']);

    Route::controller(AuthController::class)->group(function () {
        Route::post('register', 'register');
        Route::post('login', 'login');
        Route::post('forgot', 'forgotPassword');
        Route::put('reset', 'resetPassword');
        Route::get('reset', 'checkExistToken');
    });

    Route::get('categories', [CategoryController::class, 'index']);

    Route::prefix('products/')
        ->controller(ProductController::class)
        ->group(function () {
            Route::get('special', 'getProductSpecial');
            Route::get('sale', 'getProductSale');
            Route::get('suggest', 'getProductSuggest');
            Route::get('other', 'getOtherProduct');
            Route::get('{slug}/store', 'getStore');
            Route::get('{slug}', 'show');
        });
});
