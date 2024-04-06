<?php

namespace App\Services\ProductVariant;

use App\Models\ProductVariant;
use App\Repositories\ProductVariant\ProductVariantRepository;

interface ProductVariantService
{
    public function getRepository(): ProductVariantRepository;

    public function storeProductVariant(array $attributes): ProductVariant;

    public function deleteProductVariant(int $id);

    public function upsertProductVariant(array $attributes);
}
