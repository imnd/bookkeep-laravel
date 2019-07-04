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
    foreach (['articles', 'articleCats', 'articleSubcats', 'bills', 'clients', 'contracts', 'invoices', 'purchases', 'regions', 'settings'] as $entityName) {
        $pathPrefix = "api.$entityName";
        $controllerName = ucfirst($entityName) . 'Controller';
        Route::get("/$entityName/list", "$controllerName@list")->name("$pathPrefix.list");
        Route::post("/$entityName/store", "$controllerName@store")->name("$pathPrefix.store");
        Route::get("/$entityName/edit/{id}", "$controllerName@edit")->name("$pathPrefix.edit");
        Route::post("/$entityName/update/{id}", "$controllerName@update")->name("$pathPrefix.update");
        Route::delete("/$entityName/delete/{id}", "$controllerName@delete")->name("$pathPrefix.delete");
    }
    foreach (['invoices', 'contracts', 'purchases'] as $entityName) {
        $controllerName = ucfirst($entityName) . 'Controller';
        Route::get("/$entityName/rows/{id}", "$controllerName@rows")->name("api.$entityName.rows");
    }
    Route::get("/article-subcats/list", "ArticleSubcatsController@list");
});
