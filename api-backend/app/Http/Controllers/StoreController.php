<?php

namespace App\Http\Controllers;

use App\Helper\ImageManagerTrait;
use App\Http\Requests\Store\UpdateStoreRequest;
use App\Http\Resources\Store\StoreDetailResource;
use App\Http\Resources\Store\StoreGeneralResource;
use App\Services\Store\StoreService;
use App\Services\User\UserService;
use App\Traits\APIResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    use APIResponseTrait, ImageManagerTrait;

    public function __construct(protected StoreService $storeService, protected UserService $userService)
    {
    }

    public function getGeneralInfo(int $id): JsonResponse
    {
        try {
            $data = $this->storeService->getStoreById($id);
            return $this->successResponse(new StoreGeneralResource($data), 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function edit(int $id): JsonResponse
    {
        try {
            $data = $this->storeService->getStoreById($id);
            return $this->successResponse(new StoreDetailResource($data), 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function update(UpdateStoreRequest $request, int $id): JsonResponse
    {
        try {
            $params = $request->validated();
            if ($file = $request->image) {
                $fileData = $this->uploads($file);
                $params['image'] = $fileData['path'];
            }

            $params['store_id'] = $id;
            $this->storeService->updateStore($id, $params);
            $this->userService->updateUser($params);

            return $this->successResponse(null, 'Update Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function sumary(): JsonResponse
    {
        try {
            $params['wait_confirm'] = 0;
            $params['wait_products'] = 0;
            $params['processed'] = 0;
            $params['cancel_order'] = 0;
            $params['pending'] = 0;
            $params['lock_product'] = 0;
            $params['product_out'] = 0;
            $params['access'] = 0;
            $params['view'] = 0;
            $params['order'] = 0;
            $params['conversion_rate'] = 0;

            return $this->successResponse($params, 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }
}
