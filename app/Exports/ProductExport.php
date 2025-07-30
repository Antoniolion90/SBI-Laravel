<?php

namespace App\Exports;

use App\Repositories\ProductRepository;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings
{
    public function collection(): Collection
    {
        $productRepository = app(ProductRepository::class);

        return $productRepository->all()
            ->map(function ($product) {
                return [
                    $product->name,
                    $product->barcode,
                    $product->price,
                    $product->category->name,
                ];
            });
    }

    public function headings(): array
    {
        return ['Название товара', 'Штрихкод', 'Цена', 'Название категории'];
    }
}

