<?php

namespace App\Services\City;

use App\Models\City;
use App\Repositories\City\CityRepository;
use Illuminate\Support\Collection;

class CityServiceEloquent implements CityService
{
    protected CityRepository $cityRepository;
    public function __construct(CityRepository $cityRepository)
    {
        return $this->cityRepository = $cityRepository;
    }

    public function getRepository(): CityRepository
    {
        return $this->cityRepository;
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->cityRepository->all();
    }

    public function getCityById(int $id): ?City
    {
        return $this->cityRepository->find($id);
    }
}
