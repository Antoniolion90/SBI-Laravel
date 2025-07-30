<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ProductRepository
{
    public function all(): Collection
    {
        return Product::query()
            ->select('id', 'name', 'barcode', 'price', 'category_id')
            ->with('category:id,name')
            ->get();
    }

    public function create(array $data): Product
    {
        return DB::transaction(function () use ($data) {
            $product = Product::create($data);
            return $product->load('category:id,name');
        });
    }

    public function update(Product $product, array $data): Product
    {
        return DB::transaction(function () use ($product, $data) {
            $product->update($data);
            return $product->fresh('category:id,name');
        });
    }
}

