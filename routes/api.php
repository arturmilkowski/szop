<?php

// use Illuminate\Http\Request;
// use App\Http\Controllers\API\OrderStatusController;
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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::apiResource('backend/status', API\StatusController::class);
Route::apiResource('backend/order/{order}/status', API\OrderStatusController::class)->only(['update']);