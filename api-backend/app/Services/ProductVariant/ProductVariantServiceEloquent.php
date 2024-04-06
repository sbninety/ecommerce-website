<?php

namespace App\Services\ProductVariant;

use App\Models\ProductVariant;
use App\Repositories\ProductVariant\ProductVariantRepository;

class ProductVariantServiceEloquent implements ProductVariantService
{
    public function __construct(protected ProductVariantRepository $productVariantRepository)
    {
    }

    public function getRepository(): ProductVariantRepository
    {
        return $this->productVariantRepository;
    }

    public function storeProductVariant(array $attributes): ProductVariant
    {
        return $this->productVariantRepository->create($attributes);
    }

    public function deleteProductVariant(int $id)
    {
        return $this->productVariantRepository->delete($id);
    }

    public function upsertProductVariant(array $attributes)
    {
        return $this->productVariantRepository->upsert($attributes, ['id'], ['color', 'price']);
    }
}
