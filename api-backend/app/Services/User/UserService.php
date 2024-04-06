<?php

namespace App\Services\User;

use App\Models\User;
use App\Repositories\User\UserRepository;

interface UserService
{
    public function getRepository(): UserRepository;

    public function getUserById(int $id): ?User;

    public function saveUser(array $attribute): ?User;

    public function login(array $attribute);

    public function updateUserToken(array $attribute);

    public function checkToken(string $token): ?User;

    public function updateUserPassword(array $attribute);

    public function updateUser(array $attribute): mixed;
}
