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

Route::group([
    'namespace' => 'Api\V1',
    'middleware' => 'auth',
], function () {
    foreach (['articles', 'clients', 'invoices', 'contracts', 'purchases', 'bills'] as $modelName) {
        $controllerName = ucfirst($modelName) . 'Controller';
        Route::post("/$modelName/create", "$controllerName@create");
        Route::get("/$modelName/edit/{id}", "$controllerName@edit");
        Route::post("/$modelName/update/{id}", "$controllerName@update");
        Route::delete("/$modelName/delete/{id}", "$controllerName@delete");
        Route::get("/$modelName/list", "$controllerName@list");
    }
    foreach (['invoices', 'contracts', 'purchases'] as $modelName) {
        $controllerName = ucfirst($modelName) . 'Controller';
        Route::get("/$modelName/rows/{id}", "$controllerName@rows");
    }
    foreach (['subcats', 'regions'] as $modelName) {
        $controllerName = ucfirst($modelName) . 'Controller';
        Route::get("/$modelName/list", "$controllerName@list");
    }
});

