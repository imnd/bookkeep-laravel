<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1\ArticleCatsController;
use App\Http\Controllers\Api\V1\ArticlesController;
use App\Http\Controllers\Api\V1\ArticleSubcatsController;
use App\Http\Controllers\Api\V1\BillsController;
use App\Http\Controllers\Api\V1\ClientsController;
use App\Http\Controllers\Api\V1\ContractsController;
use App\Http\Controllers\Api\V1\InvoicesController;
use App\Http\Controllers\Api\V1\PurchasesController;
use App\Http\Controllers\Api\V1\RegionsController;
use App\Http\Controllers\Api\V1\SettingsController;

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
        $controllerName = ucfirst($modelName) . 'Controller';
        Route::get($modelName, "$controllerName@index")->name("api.$modelName.index");
        Route::post($modelName, "$controllerName@store")->name("api.$modelName.store");
    }

    foreach ([
        'get' => 'show',
        'put' => 'update',
        'delete' => 'destroy',
    ] as $method => $action) {
        Route::$method('articles/{article}', [ArticlesController::class, $action]);
        Route::$method('articleCats/{articleCat}', [ArticleCatsController::class, $action]);
        Route::$method('article-subcats/{articleSubcat}', [ArticleSubcatsController::class, $action]);
        Route::$method('bills/{bill}', [BillsController::class, $action]);
        Route::$method('clients/{client}', [ClientsController::class, $action]);
        Route::$method('contracts/{contract}', [ContractsController::class, $action]);
        Route::$method('invoices/{invoice}', [InvoicesController::class, $action]);
        Route::$method('purchases/{purchase}', [PurchasesController::class, $action]);
        Route::$method('regions/{region}', [RegionsController::class, $action]);
        Route::$method('settings/{setting}', [SettingsController::class, $action]);
    }
    // rows
    foreach ([
        'invoices',
        'contracts',
        'purchases'
    ] as $modelName) {
        $controllerName = ucfirst($modelName) . 'Controller';
        Route::get("/$modelName/rows/{id}", "$controllerName@rows")->name("api.$modelName.rows");
    }
    Route::get('/article-subcats', 'ArticleSubcatsController@index');
});
