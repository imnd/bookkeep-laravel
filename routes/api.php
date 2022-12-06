<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1\{
    ArticleCatsController,
    ArticlesController,
    ArticleSubcatsController,
    BillsController,
    ClientsController,
    ContractsController,
    InvoicesController,
    PurchasesController,
    RegionsController,
    SettingsController
};

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

    foreach ([
        'get' => 'index',
        'post' => 'store',
    ] as $method => $action) {
        foreach (['articles', 'article-cats', 'article-subcats', 'bills', 'clients', 'contracts', 'invoices', 'purchases', 'regions', 'settings'] as $modelName) {
            Route::$method($modelName, getControllerName($modelName) . "@$action");
        }
    }

    foreach ([
        'get'    => 'show',
        'put'    => 'update',
        'delete' => 'destroy',
    ] as $method => $action) {
        foreach ([
            'articles',
            'article-cats',
            'article-subcats',
            'bills',
            'clients',
            'contracts',
            'invoices',
            'purchases',
            'regions',
            'settings',
        ] as $modelName) {
            Route::$method("$modelName/{model}", getControllerName($modelName) . "@$action");
        }
    }

    // rows
    foreach ([
        'invoices',
        'contracts',
        'purchases'
    ] as $modelName) {
        Route::get("/$modelName/rows/{model}", getControllerName($modelName) . "@rows")->name("api.$modelName.rows");
    }
});

function getControllerName($modelName) {
    $modelNameArr = explode('-', $modelName);
    array_walk($modelNameArr, function(&$elt) {
        $elt = ucfirst($elt);
    });

    return implode('', $modelNameArr) . 'Controller';
}