<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityResouce;
use App\Services\City\CityService;
use App\Traits\APIResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CityController extends Controller
{
    use APIResponseTrait;

    public function __construct(protected CityService $cityService)
    {
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $cities = $this->cityService->getAll();
            return $this->successResponse(CityResouce::collection($cities));
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }
}
