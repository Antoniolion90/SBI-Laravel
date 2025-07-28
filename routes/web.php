<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Ваш IP: ' . request()->ip();
});
