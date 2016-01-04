<?php
Route::get('/', 'WelcomeController@index');
Route::get('admin/categories', 'AdminCategoriesController@index');
Route::get('admin/products', 'AdminProductsController@index');


Route::controllers ([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);
