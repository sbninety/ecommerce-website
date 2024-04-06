<?php

namespace App\Services\Product;

use App\Models\Product;
use App\Repositories\Product\ProductRepository;
use Illuminate\Support\Collection;

interface ProductService
{
    public function getRepository(): ProductRepository;

    public function getProductSpecial(): Collection;

    public function getProductSale(): Collection;

    public function getProductSuggest(): Collection;

    public function getProductBySlug(string $slug): ?Product;

    public function getOtherProduct(): Collection;

    public function getAll(int $id): Collection;

    public function updateProduct(int $id, array $attributes): mixed;

    public function deleteProduct(int $id): bool;

    public function storeProduct(array $attributes): ?Product;

    public function getProductById(int $id): ?Product;

    public function setDraft(int $id, string $draft);

    public function search(array $attributes): Collection;
}
