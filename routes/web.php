<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return view('index');
});

//Route::group(['middleware' => 'auth'], function()
//{
    Route::get('/articles/items', [
        'uses' => 'ArticlesController@items'
    ]);
    Route::get('/articles/view/{article}', [
        'uses' => 'ArticlesController@view'
    ]);
    Route::any('/articles/create', [
        'uses' => 'ArticlesController@create'
    ]);
    Route::any('/articles/update/{article}', [
        'uses' => 'ArticlesController@update'
    ]);
//});

