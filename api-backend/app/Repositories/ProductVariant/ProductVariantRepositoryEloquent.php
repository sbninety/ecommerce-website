<?php

namespace App\Repositories\ProductVariant;

use App\Models\ProductVariant;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProductVariant\ProductVariantRepository;
use App\Validators\ProductVariant\ProductVariantValidator;

/**
 * Class ProductVariantRepositoryEloquent.
 *
 * @package namespace App\Repositories\ProductVariant;
 */
class ProductVariantRepositoryEloquent extends BaseRepository implements ProductVariantRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductVariant::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
