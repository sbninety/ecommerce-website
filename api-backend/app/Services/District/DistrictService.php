<?php

namespace App\Services\District;

use App\Models\District;
use App\Repositories\District\DistrictRepository;
use Illuminate\Support\Collection;

interface DistrictService
{
    /**
     * @return DistrictRepository
     */
    public function getRepository(): DistrictRepository;

    public function getDistrictByCityId(int $id): Collection;

    public function getDistrictById(int $id): ?District;
}
