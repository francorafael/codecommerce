<?php
//
Route::group(['prefix'=>'admin', 'middleware' => ['auth','authorization'], 'where' => ['id' => '[0-9]+']], function()
{
    //ROTAS CATEGORIAS
    Route::group(['prefix'=>'categories'], function()  {
        Route::get('/', ['as'=>'categories', 'uses'=>'CategoriesController@index']);
        Route::post('/', ['as'=>'categories.store', 'uses'=>'CategoriesController@store']);
        Route::get('/create', ['as'=>'categories.create', 'uses'=>'CategoriesController@create']);
        Route::get('/{id}/destroy', ['as'=>'categories.destroy', 'uses'=>'CategoriesController@destroy']);
        Route::get('/{id}/edit', ['as'=>'categories.edit', 'uses'=>'CategoriesController@edit']);
        #UPDATE POR POST
        #Route::post('categories/{id}/update', ['as'=>'categories.update', 'uses'=>'CategoriesController@update']);
        #UPDATE POR PUT - VAI UTLIZAR METHOD SPOOFING
        Route::put('/{id}/update', ['as'=>'categories.update', 'uses'=>'CategoriesController@update']);
    });

    Route::group(['prefix'=>'orders'], function()  {
        Route::get('/', ['as' => 'orders', 'uses' => 'OrdersController@index']);
        Route::get('/{id}/{value}/update', ['as'=>'orders.update', 'uses'=>'OrdersController@update']);
    });

    //ROTAS PRODUCTS
    Route::group(['prefix'=>'products'], function()  {
        Route::get('', ['as'=>'products', 'uses'=>'ProductsController@index']);
        Route::get('/create', ['as'=>'products.create', 'uses'=>'ProductsController@create']);
        Route::post('', ['as'=>'products.store', 'uses'=>'ProductsController@store']);
        Route::get('/{id}/edit', ['as'=>'products.edit', 'uses'=>'ProductsController@edit']);
        Route::put('/{id}/update', ['as'=>'products.update', 'uses'=>'ProductsController@update']);
        Route::get('/{id}/destroy', ['as'=>'products.destroy', 'uses'=>'ProductsController@destroy']);

        Route::group(['prefix'=>'images'], function(){
            Route::get('{id}/product', ['as'=>'products.images', 'uses'=>'ProductsController@images']);
            Route::get('create/{id}/product', ['as'=>'products.images.create', 'uses'=>'ProductsController@createImage']);
            Route::post('store/{id}/product', ['as'=>'products.images.store', 'uses'=>'ProductsController@storeImage']);
            Route::get('destroy/{id}/product', ['as'=>'products.images.destroy', 'uses'=>'ProductsController@destroyImage']);
        });

    });

    Route::group(['prefix'=>'users'], function()  {
        Route::get('/', ['as'=>'users', 'uses'=>'UserController@index']);
    });

});

Route::get('/', ['as'=>'store', 'uses'=>'StoreController@index']);
Route::get('/home', ['as'=>'store', 'uses'=>'StoreController@index']);
Route::get('category/{id}', ['as'=>'store.category', 'uses'=>'StoreController@category']);
Route::get('product/{id}', ['as'=>'store.product', 'uses'=>'StoreController@product']);
Route::get('tag/{id}', ['as'=>'store.tag', 'uses'=>'StoreController@tag']);
Route::get('cart', ['as'=>'cart', 'uses'=>'CartController@index']);
Route::get('cart/add/{id}', ['as'=>'cart.add', 'uses'=>'CartController@add']);
Route::get('cart/destroy/{id}', ['as'=>'cart.destroy', 'uses'=>'CartController@destroy']);
Route::get('cart/update-item', ['as' => 'cart.update-items', 'uses' => 'CartController@updateItem']);


Route::group(['middleware'=>'auth'], function() {
    Route::get('checkout/placeOrder', ['as' => 'checkout.place', 'uses' => 'CheckoutController@place']);
    Route::get('checkout/retorno', ['as' => 'checkout.retorno', 'uses' => 'CheckoutController@retorno']);
    Route::get('account/orders', ['as' => 'account.orders', 'uses' => 'AccountController@orders']);

});

Route::get('/test', ['as'=>'store', 'uses'=>'CheckoutController@test']);

Route::get('evento', function() {
    //DISPARA O EVENTO
    //\Illuminate\Support\Facades\Event::fire(new \CodeCommerce\Events\CheckoutEvent());
    //DISPARANDO EVENTO COM HELPER
    event(new \CodeCommerce\Events\CheckoutEvent());
});

Route::controllers ([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
    'test'     => 'TestController'
]);
