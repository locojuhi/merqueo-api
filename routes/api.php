<?php

use Illuminate\Http\Request;

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

Route::namespace('Api')->group(function () {
    Route::apiResources([
        'products' => 'ProductController',
        'transporters' => 'TransporterController',
    ]);

    Route::prefix('transporters')->group(function (){
        Route::get('/{transporterId}', 'TransporterController@show');
        Route::get('/{transporterId}/orders', 'TransporterController@orders');
        Route::get('/{transporterId}/orders/{orderId}', 'TransporterController@viewOrder');
    });
});



