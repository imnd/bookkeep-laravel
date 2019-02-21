<?php

/* VUE SPA */
/*Route::get('/articles', function () {
  return view('articles.index');
});

Route::get('/articles/{any}', function () {
    return view('articles.index');
})->where('any', '.*');*/

Auth::routes();

Route::get('/', function() {
    return view('index');
});

//Route::group(['middleware' => 'auth'], function()
//{
    Route::get('/articles', function () {
        return view('articles.index');
    });

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

// VUE JS
Route::get('/clients/{any}', function () {
    return view('clients');
})->where('any', '.*');
