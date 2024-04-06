<?php

namespace App\Services\Product;

use App\Models\Product;
use App\Repositories\Product\ProductRepository;
use Illuminate\Support\Collection;

class ProductServiceEloquent implements ProductService
{
    public function __construct(protected ProductRepository $productRepository)
    {
    }

    public function getRepository(): ProductRepository
    {
        return $this->productRepository;
    }

    public function getProductSpecial(): Collection
    {
        return $this->productRepository
            ->where('published', 1)
            ->where('special', true)
            ->select(
                'id',
                'name',
                'slug',
                'price',
                'discount',
                'discount_type'
            )
            ->get();
    }

    public function getProductSale(): Collection
    {
        return $this->productRepository
            ->where('published', 1)
            ->whereNotNull('discount')
            ->select(
                'id',
                'name',
                'slug',
                'price',
                'discount',
                'discount_type'
            )
            ->get();
    }

    public function getProductSuggest(): Collection
    {
        return $this->productRepository
            ->where('published', 1)
            ->inRandomOrder()
            ->take(8)
            ->select(
                'id',
                'name',
                'slug',
                'price',
                'discount',
                'discount_type'
            )
            ->get();
    }

    public function getProductBySlug(string $slug): ?Product
    {
        return $this->productRepository
            ->where('slug', $slug)
            ->select(
                'id',
                'store_id',
                'category_id',
                'name',
                'price',
                'discount',
                'discount_type',
                'quantity',
                'description',
                'brand',
                'warranty',
                'warranty_type',
                'city_id'
            )
            ->first();
    }

    public function getOtherProduct(): Collection
    {
        return $this->productRepository
            ->where('published', 1)
            ->inRandomOrder()
            ->take(4)
            ->select(
                'id',
                'name',
                'slug',
                'price',
                'discount',
                'discount_type'
            )
            ->get();
    }

    public function getAll(int $id): Collection
    {
        return $this->productRepository
            ->where('products.store_id', $id)
            ->get();
    }

    public function updateProduct(int $id, array $attributes): mixed
    {
        return $this->productRepository->update($attributes, $id);
    }

    public function deleteProduct(int $id): bool
    {
        return $this->productRepository->delete($id);
    }

    public function storeProduct(array $attributes): ?Product
    {
        return $this->productRepository->create($attributes);
    }

    public function getProductById(int $id): ?Product
    {
        return $this->productRepository->find($id);
    }

    public function setDraft(int $id, string $draft)
    {
        return $this->productRepository
            ->where('products.id', $id)
            ->update([
                'draft' => $draft
            ]);
    }

    public function search(array $attributes): Collection
    {
        if ($attributes['keyword'] && !$attributes['type'] && !$attributes['published']) {
            return $this->productRepository
                ->where('products.store_id', $attributes['store_id'])
                ->where('products.name', 'like', '%' . $attributes['keyword'] . '%')->get();
        }
        if (!$attributes['keyword'] && $attributes['type'] && !$attributes['published']) {
            return $this->productRepository
                ->where('products.store_id', $attributes['store_id'])
                ->where('products.type', $attributes['type'])->get();
        }
        if (!$attributes['keyword'] && !$attributes['type'] && $attributes['published']) {
            return $this->productRepository
                ->where('products.store_id', $attributes['store_id'])
                ->where('products.published', $attributes['published'])->get();
        }
        if ($attributes['keyword'] && $attributes['type'] && !$attributes['published']) {
            return $this->productRepository
                ->where('products.store_id', $attributes['store_id'])
                ->where('products.name', 'like', '%' . $attributes['keyword'] . '%')
                ->where('products.type', $attributes['type'])->get();
        }
        if (!$attributes['keyword'] && $attributes['type'] && $attributes['published']) {
            return $this->productRepository
                ->where('products.store_id', $attributes['store_id'])
                ->where('products.type', $attributes['type'])
                ->where('products.published', $attributes['published'])
                ->get();
        }
        if ($attributes['keyword'] && !$attributes['type'] && $attributes['published']) {
            return $this->productRepository
                ->where('products.store_id', $attributes['store_id'])
                ->where('products.name', 'like', '%' . $attributes['keyword'] . '%')
                ->where('products.published', $attributes['published'])->get();
        }
        return $this->productRepository
            ->where('products.store_id', $attributes['store_id'])
            ->where('products.name', 'like', '%' . $attributes['keyword'] . '%')
            ->where('products.type', $attributes['type'])
            ->where('products.published', $attributes['published'])
            ->get();
    }
}
