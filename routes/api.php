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

Route::middleware('auth:api')
    ->get('/user', function (Request $request) {
        return $request->user();
    });

Route::group([
    'namespace' => 'Api\V1',
    'middleware' => 'auth:api',
], function () {
    foreach (['articles', 'articleCats', 'articleSubcats', 'bills', 'clients', 'contracts', 'invoices', 'purchases', 'regions', 'settings'] as $modelName) {
        $pathPrefix = "api.$modelName";
        $controllerName = ucfirst($modelName) . 'Controller';
        $entityName = "\{$modelName\}";
        Route::get("/$modelName", "$controllerName@list")->name("$pathPrefix.list");
        Route::post("/$modelName", "$controllerName@store")->name("$pathPrefix.store");
        Route::get("/$modelName/$entityName", "$controllerName@edit")->name("$pathPrefix.show");
        Route::put("/$modelName/$entityName", "$controllerName@update")->name("$pathPrefix.update");
        Route::delete("/$modelName/$entityName", "$controllerName@delete")->name("$pathPrefix.delete");
    }
    foreach ([
        'invoices',
        'contracts',
        'purchases'
    ] as $entityName) {
        $controllerName = ucfirst($modelName) . 'Controller';
        Route::get("/$modelName/rows/{id}", "$controllerName@rows")->name("api.$modelName.rows");
    }
    Route::get('/article-subcats', 'ArticleSubcatsController@list');
});
