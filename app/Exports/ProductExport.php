<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromArray, WithHeadings
{
    public function array(): array
    {
        return Product::with('category')->get()
            ->map(function ($product) {
                return [
                    $product->name,
                    $product->barcode,
                    $product->price,
                    $product->category->name,
                ];
            })->toArray();
    }

    public function headings(): array
    {
        return ['Название товара', 'Штрихкод', 'Цена', 'Название категории'];
    }
}

