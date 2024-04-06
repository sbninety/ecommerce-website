<?php

namespace App\Repositories\Notify;

use App\Models\Notify;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Notify\NotifyRepository;
use App\Validators\Notify\NotifyValidator;

/**
 * Class NotifyRepositoryEloquent.
 *
 * @package namespace App\Repositories\Notify;
 */
class NotifyRepositoryEloquent extends BaseRepository implements NotifyRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Notify::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
