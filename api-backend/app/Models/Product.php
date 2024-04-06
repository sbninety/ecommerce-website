<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'store_id',
        'sku',
        'name',
        'slug',
        'quantity',
        'price',
        'discount',
        'discount_type',
        'published',
        'description',
        'brand',
        'warranty',
        'warranty_type',
        'city_id',
        'draft'
    ];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function images(): BelongsToMany
    {
        return $this->belongsToMany(Image::class);
    }

    public function product_variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
