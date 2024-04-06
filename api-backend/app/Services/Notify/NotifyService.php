<?php

namespace App\Services\Notify;

use App\Repositories\Notify\NotifyRepository;
use Illuminate\Support\Collection;

interface NotifyService
{
    public function getRepository(): NotifyRepository;

    public function getAll(): Collection;
}
