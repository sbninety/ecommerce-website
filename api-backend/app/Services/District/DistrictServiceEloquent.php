<?php

namespace App\Services\District;

use App\Models\District;
use App\Repositories\District\DistrictRepository;
use App\Services\District\DistrictService;
use Illuminate\Support\Collection;

class DistrictServiceEloquent implements DistrictService
{
    public function __construct(protected DistrictRepository $districtRepository)
    {
    }

    /**
     * @return DistrictRepository
     */
    public function getRepository(): DistrictRepository
    {
        return $this->districtRepository;
    }

    /**
     * @param int $id
     * @return Collection
     */
    public function getDistrictByCityId(int $id): Collection
    {
        return $this->districtRepository
            ->where('districts.city_id', $id)
            ->select('id', 'name')
            ->get();
    }

    public function getDistrictById(int $id): ?District
    {
        return $this->districtRepository->find($id);
    }
}
