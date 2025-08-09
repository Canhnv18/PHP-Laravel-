<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Client\ProductController as ClientController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [ClientController::class, 'list']);
Route::get('/detail-product/{product}', [ClientController::class, 'details']);
Route::prefix('admin')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    // Route::prefix('products')->group(function () {
    //     Route::get('/', [ProductController::class, 'index']);
    //     Route::get('/create', [ProductController::class, 'create']);
    // });
    Route::resource('products', ProductController::class);
});
