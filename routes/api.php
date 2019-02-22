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

Route::group(['namespace' => 'Api\V1'], function () {
    // regions
    Route::get('/regions/list', 'RegionsController@list');
    // clients
    Route::post('/clients/create', 'ClientsController@create');
    Route::get('/clients/edit/{id}', 'ClientsController@edit');
    Route::post('/clients/update/{id}', 'ClientsController@update');
    Route::delete('/clients/delete/{id}', 'ClientsController@delete');
    Route::get('/clients/list', 'ClientsController@list');
    // articles
    Route::post('/articles/create', 'ArticlesController@create');
    Route::get('/articles/edit/{id}', 'ArticlesController@edit');
    Route::post('/articles/update/{id}', 'ArticlesController@update');
    Route::delete('/articles/delete/{id}', 'ArticlesController@delete');
    Route::get('/articles/list', 'ArticlesController@list');
});

