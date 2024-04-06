<?php

namespace App\Http\Controllers;

use App\Http\Resources\NotifyResource;
use App\Services\Notify\NotifyService;
use App\Traits\APIResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NotifyController extends Controller
{
    use APIResponseTrait;

    public function __construct(protected NotifyService $notifyService)
    {
    }

    public function index(): JsonResponse
    {
        try {
            $data = $this->notifyService->getAll();
            return $this->successResponse(NotifyResource::collection($data), 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }
}
