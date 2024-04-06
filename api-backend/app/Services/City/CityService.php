<?php

namespace App\Services\City;

use App\Models\City;
use App\Repositories\City\CityRepository;
use Illuminate\Support\Collection;

interface CityService
{
    /**
     * @return CityRepository
     */
    public function getRepository(): CityRepository;

    public function getAll(): Collection;

    public function getCityById(int $id): ?City;
}
