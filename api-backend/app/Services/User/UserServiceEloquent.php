<?php

namespace App\Services\User;

use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class UserServiceEloquent implements UserService
{
    public function __construct(protected UserRepository $userRepository)
    {
    }

    public function getRepository(): UserRepository
    {
        return $this->userRepository;
    }

    public function getUserById(int $id): ?User
    {
        return $this->userRepository
            ->where('users.id', $id)
            ->leftJoin('stores', 'users.store_id', '=', 'stores.id')
            ->select(
                'users.email as email',
                'stores.name as shopName',
                'stores.city_id as city',
                'stores.district_id as district',
                'stores.address as address',
            )
            ->first();
    }

    public function saveUser(array $attribute): ?User
    {
        return $this->userRepository->create($attribute);
    }

    public function login(array $attribute): ?Authenticatable
    {
        if (Auth::attempt($attribute)) {
            return Auth::user();
        }
        return null;
    }

    public function updateUserToken(array $attribute)
    {
        return $this->userRepository
            ->where('users.email', $attribute['email'])
            ->update(['token' => $attribute['token']]);
    }

    public function checkToken(string $token): ?User
    {
        return $this->userRepository->where('users.token', $token)->first();
    }

    public function updateUserPassword(array $attribute)
    {
        return $this->userRepository
            ->where('users.token', $attribute['token'])
            ->update([
                'token' => null,
                'password' => bcrypt($attribute['password'])
            ]);
    }

    public function updateUser(array $attribute): mixed
    {
        return $this->userRepository
            ->where('users.store_id', $attribute['store_id'])
            ->update([
                'name' => $attribute['username'],
                'phone' => $attribute['phone'],
                'gender' => $attribute['gender']
            ]);
    }
}
