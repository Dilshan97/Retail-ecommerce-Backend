<?php

use App\Http\Controllers\OrderController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'order'], function () {
    Route::get('/', [OrderController::class, 'get_orders']);
    Route::post('/create_order', [OrderController::class, 'create_order']);
    Route::get('/get_order/{customer}', [OrderController::class, 'get_order_by_customer']);
});
