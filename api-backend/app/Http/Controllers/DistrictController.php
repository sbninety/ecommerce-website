<?php

namespace App\Http\Controllers;

use App\Http\Resources\DistrictResource;
use App\Services\District\DistrictService;
use App\Traits\APIResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    use APIResponseTrait;

    public function __construct(protected DistrictService $districtService)
    {
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function getDistrictByCityId(Request $request): JsonResponse
    {
        try {
            $id = $request->get('city_id');
            if (!$id) {
                return $this->errorResponse(null, 'Somethings went wrong', 400);
            }
            $data = $this->districtService->getDistrictByCityId($id);
            return $this->successResponse(DistrictResource::collection($data));
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Data not found.', 404);
        }
    }
}
