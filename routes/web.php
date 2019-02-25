<?php

Auth::routes();

Route::get('/', function() {
    return view('index');
});

//Route::group(['middleware' => 'auth'], function()
//{
    // VUE JS
    foreach (['articles', 'clients', 'invoices', 'contracts', 'purchases', 'bills'] as $modelName) {
        Route::get("/$modelName/{any}", function () use ($modelName) {
            return view($modelName);
        })->where('any', '.*');
    }

    Route::get('settings', function() {
        return view('settings');
    });
//});
