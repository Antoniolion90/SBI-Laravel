<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class CategoryRepository
{
    public function all(): Collection
    {
        return Category::all();
    }

    public function create(array $data): Category
    {
        return DB::transaction(function () use ($data) {
            return Category::create($data);
        });
    }

    public function update(Category $category, array $data): Category
    {
        return DB::transaction(function () use ($category, $data) {
            $category->update($data);
            return $category->fresh();
        });
    }
}
