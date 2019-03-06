<?php

Auth::routes();

Route::get('/', function() {
    return view('index');
});

Route::group(['middleware' => 'auth'], function()
{
    // VUE JS
    foreach (['articles', 'clients', 'invoices', 'contracts', 'purchases', 'bills'] as $entity) {
        Route::get("/$entity/{any}", function () use ($entity) {
            return view($entity);
        })->where('any', '.*');
    }

    Route::get('settings', function() {
        return view('settings');
    });
});
