<?php

namespace App\Services\Notify;

use App\Repositories\Notify\NotifyRepository;
use Illuminate\Support\Collection;

class NotifyServiceEloquent implements NotifyService
{
    public function __construct(protected NotifyRepository $notifyRepository)
    {
    }

    public function getRepository(): NotifyRepository
    {
        return $this->notifyRepository;
    }

    public function getAll(): Collection
    {
        return $this->notifyRepository->all();
    }
}
