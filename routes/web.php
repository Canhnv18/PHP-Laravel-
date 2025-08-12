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

    Route::resource('products', ProductController::class);
});
