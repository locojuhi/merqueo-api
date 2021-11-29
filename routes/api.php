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
Route::group(['middleware' => ['cors']], function () {
    //Rutas a las que se permitirá acceso

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->group(function () {
    Route::apiResource('orders', 'OrderController')->except([
        'store',
        'update',
        'destroy',
        'create'
    ]);
    Route::apiResource('products', 'ProductController')->except([
        'store',
        'update',
        'destroy',
        'create'
    ]);
    Route::apiResource('transporters', 'TransporterController')->except([
        'store',
        'update',
        'destroy',
        'create'
    ]);

    Route::prefix('transporters')->group(function (){
        Route::get('/{transporterId}', 'TransporterController@show');
        Route::get('/{transporterId}/orders', 'TransporterController@orders');
        Route::get('/{transporterId}/orders/{orderId}', 'TransporterController@viewOrder');
    });

    Route::prefix('orders')->group(function (){
        Route::patch('/{orderId}', 'OrderController@dispatchOrder');
    });


});
});
