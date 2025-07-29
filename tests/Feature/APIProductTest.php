<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Tests\TestCase;

class APIProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_store_product(): void
    {
        $response = $this->json('POST', '/api/products', [
            'name' => 'Test Product',
            'price' => number_format(mt_rand(100, 100000) / 100, 2),
            'barcode' => str_pad(mt_rand(0, 9999999999999), 13, '0', STR_PAD_LEFT),
            'category_id' => Category::first()->id
        ]);

        $response->assertStatus(201);

        $response->assertJsonStructure([
            'id', 'name', 'price', 'barcode', 'category'
        ]);
    }

    public function test_update_price_product(): void
    {
        $product = Product::query()->where('name', 'Test Product')->firstOrFail();

        $response = $this->json('PUT', '/api/products/'.$product->id, [
            'price' => number_format(mt_rand(100, 100000) / 100, 2),
        ]);

        $response->assertStatus(200);
    }
}
