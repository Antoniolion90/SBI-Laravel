<?php

use App\Http\Controllers\API\CategoryController;

use App\Http\Controllers\API\ProductController;
use Illuminate\Support\Facades\Route;

Route::apiResource('categories', CategoryController::class)
    ->whereNumber('category');

Route::apiResource('products', ProductController::class)
    ->whereNumber('product');
