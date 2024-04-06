<?php

namespace App\Services\Category;

use App\Repositories\Category\CategoryRepository;
use Illuminate\Support\Collection;

interface CategoryService
{
    public function getRepository(): CategoryRepository;

    public function getAll(): Collection;
}
