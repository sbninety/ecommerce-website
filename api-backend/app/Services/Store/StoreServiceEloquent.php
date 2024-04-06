<?php

namespace App\Services\Store;

use App\Models\Store;
use App\Repositories\Store\StoreRepository;

class StoreServiceEloquent implements StoreService
{
    public function __construct(protected StoreRepository $storeRepository)
    {
    }

    public function getRepository(): StoreRepository
    {
        return $this->storeRepository;
    }

    /**
     * @param int $id
     * @return Store
     */
    public function getStoreById(int $id): ?Store
    {
        return $this->storeRepository->find($id);
    }

    public function storeStore(array $attribute): ?Store
    {
        return $this->storeRepository->create($attribute);
    }

    public function updateStore(int $id, array $attribute): mixed
    {
        return $this->storeRepository->update($attribute, $id);
    }
}
