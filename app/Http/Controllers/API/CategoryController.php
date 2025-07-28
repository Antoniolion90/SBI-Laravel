<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Category\StoreRequest;
use App\Http\Requests\API\Category\UpdateRequest;
use App\Http\Resources\API\CategoryResource;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function __construct(
        protected CategoryRepository $repository
    ) {}

    public function index(): JsonResponse
    {
        $categories = $this->repository->all();
        return response()->json(CategoryResource::collection($categories));
    }

    public function store(StoreRequest $request): JsonResponse
    {
        $category = $this->repository->create($request->validated());
        return response()->json(new CategoryResource($category), 201);
    }

    public function show(Category $category): JsonResponse
    {
        return response()->json(new CategoryResource($category));
    }

    public function update(UpdateRequest $request, Category $category): JsonResponse
    {
        $updatedCategory = $this->repository->update($category, $request->validated());
        return response()->json(new CategoryResource($updatedCategory));
    }

    public function destroy(Category $category): JsonResponse
    {
        $category->delete();
        return response()->json(null, 204);
    }
}
