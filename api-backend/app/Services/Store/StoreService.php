<?php

namespace App\Services\Store;

use App\Models\Store;
use App\Repositories\Store\StoreRepository;

interface StoreService
{
    /**
     * @return StoreRepository
     */
    public function getRepository(): StoreRepository;

    public function getStoreById(int $id): ?Store;

    public function storeStore(array $attribute): ?Store;

    public function updateStore(int $id, array $attribute): mixed;
}
