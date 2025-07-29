<?php

namespace App\Services;

use App\Exports\ProductExport;
use Maatwebsite\Excel\Facades\Excel;

class ProductExportService
{
    public function export(): void
    {
        Excel::store(new ProductExport, 'exports/products.xlsx', 'public');
    }
}
