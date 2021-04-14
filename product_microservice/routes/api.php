<?php

use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
    return 'Product Microservice';
});

Route::group(['prefix' => 'product'], function () {
    Route::get('/', [ProductController::class, 'get_products']);
    Route::post('/create', [ProductController::class, 'create_product']);
    Route::put('/update/{id}', [ProductController::class, 'update_product']);
    Route::delete('/{id}', [ProductController::class, 'delete_product']);
    Route::get('/{id}', [ProductController::class, 'get_product']);
});

Route::group(['prefix' => 'category'], function () {
    Route::get('/', [ProductCategoryController::class, 'get_product_categories']);
    Route::post('/create', [ProductCategoryController::class, 'create_product_category']);
});


