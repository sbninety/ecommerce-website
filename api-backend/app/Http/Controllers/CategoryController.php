<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Services\Category\CategoryService;
use App\Traits\APIResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use APIResponseTrait;

    public function __construct(protected CategoryService $categoryService)
    {
    }

    public function index(): JsonResponse
    {
        try {
            $data = $this->categoryService->getAll();
            return $this->successResponse(CategoryResource::collection($data), 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }
}
