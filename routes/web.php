<?php

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group([
    'middleware' => 'auth'
], function() {
    Route::view('/', 'pages.index');
    foreach (['articles', 'clients', 'invoices', 'contracts', 'purchases', 'bills'] as $entity) {
        Route::get("/$entity/{any}", function() use ($entity) {
            return view("pages.$entity");
        })->where('any', '.*');
    }
    Route::view('settings', 'settings');
});
