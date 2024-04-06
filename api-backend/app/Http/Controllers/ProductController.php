<?php

namespace App\Http\Controllers;

use App\Helper\ImageManagerTrait;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\EditProductRequect;
use App\Http\Requests\Product\EditProductRequest;
use App\Http\Requests\SearchRequest;
use App\Http\Resources\ImageResource;
use App\Http\Resources\Product\ProductDetailResource;
use App\Http\Resources\Product\ProductEditResource;
use App\Http\Resources\Product\ProductListResource;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductStoreResource;
use App\Http\Resources\Product\ProductVariantResource;
use App\Models\Product;
use App\Services\Image\ImageService;
use App\Services\Product\ProductService;
use App\Services\ProductImage\ProductImageService;
use App\Services\ProductVariant\ProductVariantService;
use App\Services\Store\StoreService;
use App\Traits\APIResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use APIResponseTrait, ImageManagerTrait;

    public function __construct(
        protected ProductService $productService,
        protected StoreService $storeService,
        protected ProductVariantService $productVariantService,
        protected ImageService $imageService
    ) {
    }

    public function getProductSpecial(): JsonResponse
    {
        try {
            $data = $this->productService->getProductSpecial();
            return $this->successResponse(ProductResource::collection($data), 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function getProductSale(): JsonResponse
    {
        try {
            $data = $this->productService->getProductSale();
            return $this->successResponse(ProductResource::collection($data), 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function getProductSuggest(): JsonResponse
    {
        try {
            $data = $this->productService->getProductSuggest();
            return $this->successResponse(ProductResource::collection($data), 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function getOtherProduct(): JsonResponse
    {
        try {
            $data = $this->productService->getOtherProduct();
            return $this->successResponse(ProductResource::collection($data), 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function getStore(string $slug): JsonResponse
    {
        try {
            $data = $this->productService->getProductBySlug($slug);
            return $this->successResponse(new ProductStoreResource($data->store), 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function updateStatus(Request $request, int $id): JsonResponse
    {
        try {
            $params['published'] = $request->get('published');
            $this->productService->updateProduct($id, $params);
            return $this->successResponse(null, 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function index(int $id): JsonResponse
    {
        try {
            $data = $this->productService->getAll($id);
            return $this->successResponse(ProductListResource::collection($data), 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function show(string $slug): JsonResponse
    {
        try {
            $data = $this->productService->getProductBySlug($slug);
            return $this->successResponse(new ProductDetailResource($data));
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Data not found', 404);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            $this->productService->deleteProduct($id);
            return $this->successResponse(null, 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function draftCreate(CreateProductRequest $request): JsonResponse
    {
        // dd($request->all());
        try {
            DB::beginTransaction();
            $params = $request->validated();

            $params['slug'] = Str::slug($params['slug']);
            $params['published'] = 3;
            $params['store_id'] = Auth::user()->store_id;

            $product = $this->productService->storeProduct($params);

            $this->storeImage($product, $request);

            $this->storeVariant($product, $request);

            DB::commit();
            return $this->successResponse(null, 'Successfully', 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    private function storeImage(Product $product, mixed $request): void
    {
        if ($request->images) {
            foreach ($request->images as $image) {
                $fileData = $this->uploads($image);
                $imageUpload = $this->imageService->storeImage($fileData);
                $product->images()->attach($imageUpload->id);
            }
        }
    }

    private function storeVariant(Product $product, mixed $request): void
    {
        $attributes['product_id'] = $product->id;
        if ($request->variants) {
            foreach ($request->variants as $variant) {
                $attributes['color'] = $variant['color'];
                $attributes['price'] = $variant['price'];
                $this->productVariantService->storeProductVariant($attributes);
            }
        }
    }

    public function publishCreate(CreateProductRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $params = $request->validated();

            $params['slug'] = Str::slug($params['slug']);
            $params['store_id'] = Auth::user()->store_id;

            $product = $this->productService->storeProduct($params);

            $this->storeImage($product, $request);

            $this->storeVariant($product, $request);

            DB::commit();
            return $this->successResponse(null, 'Successfully', 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function edit(int $id): JsonResponse
    {
        try {
            $product = $this->productService->getProductById($id);
            if ($product['draft']) {
                return $this->successResponse(json_decode($product['draft']), 'Successfully', 200);
            }
            return $this->successResponse(new ProductEditResource($product), 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function draftUpdate(EditProductRequest $request, int $id): JsonResponse
    {
        try {
            DB::beginTransaction();
            $params = $this->execute($request);

            $product = $this->productService->getProductById($id);

            if ($product->published == 1 || $product->published == 2) {
                $attributes['draft'] = json_encode($params);
                $this->productService->updateProduct($id, $attributes);

                DB::commit();
                return $this->successResponse(null, 'Successfully', 200);
            }
            if ($product->published == 3) {

                $this->handleImages($product, $params['currentImages'], $params['images']);

                $this->handleVariants($request);

                $params['published'] = 3;
                $this->productService->updateProduct($id, $params);
                DB::commit();
                return $this->successResponse(null, 'Successfully', 200);
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    private function execute(mixed $request): mixed
    {
        $params = $request->validated();
        if ($request->photos) {
            foreach ($params['photos'] as $image) {
                $fileData = $this->uploads($image);
                $imageUpload = $this->imageService->storeImage($fileData);
                $params['images'] = [...$params['images'], ['id' => $imageUpload->id, 'path' => $imageUpload->path]];
            }
            // dd($params['images'][0]);
            if (!$params['images'][0]) {
                array_splice($params['images'], 0, 1);
            }
            unset($params['photos']);
        }
        return $params;
    }

    private function compare(mixed $a1, mixed $a2): mixed
    {
        $diff = array_diff(array_map('serialize', $a1), array_map('serialize', $a2));
        $multidimensional_diff = array_map('unserialize', $diff);

        return $multidimensional_diff;
    }

    private function handleImages(Product $product, mixed $currentImages, mixed $updateImages): void
    {
        $currentImages = array_filter($currentImages);
        $updateImages = array_filter($updateImages);

        $deleteImages = $this->compare($currentImages, $updateImages);

        foreach ($deleteImages as $image) {
            $product->images()->detach($image['id']);
        }

        $addImages = $this->compare($updateImages, $currentImages);

        foreach ($addImages as $image) {
            $product->images()->attach($image['id']);
        }
    }

    private function handleVariants(mixed $request): void
    {
        if ($request->deleteVariants) {
            foreach ($request->deleteVariants as $variant) {
                $this->productVariantService->deleteProductVariant($variant['id']);
            }
        }
        $this->productVariantService->upsertProductVariant(array_filter($request->variants));
    }

    public function publishUpdate(EditProductRequest $request, int $id): JsonResponse
    {
        try {
            DB::beginTransaction();
            $params = $this->execute($request);

            $product = $this->productService->getProductById($id);

            $this->handleImages($product, $params['currentImages'], $params['images']);

            $this->handleVariants($request);

            if ($product->published == 3) {
                $params['published'] = 1;
                $this->productService->updateProduct($id, $params);

                DB::commit();
                return $this->successResponse(null, 'Successfully', 200);
            }
            if ($product->published == 1 || $product->published == 2) {
                $params['draft'] = null;
                $params['published'] = 1;
                $this->productService->updateProduct($id, $params);

                DB::commit();
                return $this->successResponse(null, 'Successfully', 200);
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function search(SearchRequest $request): JsonResponse
    {
        try {
            $params = $request->validated();
            $params['store_id'] = Auth::user()->store_id;

            if (!$params['keyword'] && !$params['type'] && !$params['published']) {
                $data = $this->productService->getAll($params['store_id']);
                return $this->successResponse(ProductListResource::collection($data));
            }
            $data = $this->productService->search($params);
            return $this->successResponse(ProductListResource::collection($data));
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function getImages(int $id): JsonResponse
    {
        try {
            $product = $this->productService->getProductById($id);
            return $this->successResponse(ImageResource::collection($product->images), 'Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function getVariants(int $id): JsonResponse
    {
        try {
            $product = $this->productService->getProductById($id);
            return $this->successResponse(ProductVariantResource::collection($product->product_variants), 'successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }
}
