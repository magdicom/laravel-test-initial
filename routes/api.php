<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Magdicom\TestInitial\Http\Controllers\Products;

Route::middleware('api')
    ->prefix('api')
    ->get('/products', Products::class);
