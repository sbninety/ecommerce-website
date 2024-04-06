<?php

namespace App\Repositories\Store;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Store\StoreRepository;
use App\Models\Store;
use App\Validators\Store\StoreValidator;

/**
 * Class StoreRepositoryEloquent.
 *
 * @package namespace App\Repositories\Store;
 */
class StoreRepositoryEloquent extends BaseRepository implements StoreRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Store::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        // $this->pushCriteria(app(RequestCriteria::class));
    }
}
