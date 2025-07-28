<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Product\StoreRequest;
use App\Http\Requests\API\Product\UpdateRequest;
use App\Http\Resources\API\ProductResource;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function __construct(
        protected ProductRepository $repository
    ) {}

    public function index(): JsonResponse
    {
        $products = $this->repository->all();
        return response()->json(ProductResource::collection($products));
    }

    public function store(StoreRequest $request): JsonResponse
    {
        $product = $this->repository->create($request->validated());
        return response()->json(new ProductResource($product), 201);
    }

    public function show(Product $product): JsonResponse
    {
        return response()->json(new ProductResource($product));
    }

    public function update(UpdateRequest $request, Product $product): JsonResponse
    {
        $updated = $this->repository->update($product, $request->validated());
        return response()->json(new ProductResource($updated));
    }

    public function destroy(Product $product): JsonResponse
    {
        $product->delete();
        return response()->json(null, 204);
    }
}
