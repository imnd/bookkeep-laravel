<?php

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group([
    'middleware' => 'auth'
], function() {
    Route::view('/', 'pages.index');
    Route::view('/home', 'pages.index');
    Route::view('settings', 'settings', ['page' => 'settings']);
    foreach (['articles', 'bills', 'clients', 'contracts', 'invoices', 'purchases'] as $entity) {
        Route::get("$entity/{any?}", function() use ($entity) {
            return view("pages.$entity");
        })->where('any', '.*');
    }
});
