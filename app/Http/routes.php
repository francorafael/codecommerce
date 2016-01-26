<?php

//ROTAS CATEGORIAS
Route::get('/', 'WelcomeController@index');
Route::get('categories', ['as'=>'categories', 'uses'=>'CategoriesController@index']);
Route::post('categories', ['as'=>'categories.store', 'uses'=>'CategoriesController@store']);
Route::get('/categories/create', ['as'=>'categories.create', 'uses'=>'CategoriesController@create']);
Route::get('categories/{id}/destroy', ['as'=>'categories.destroy', 'uses'=>'CategoriesController@destroy']);
Route::get('categories/{id}/edit', ['as'=>'categories.edit', 'uses'=>'CategoriesController@edit']);
#UPDATE POR POST
#Route::post('categories/{id}/update', ['as'=>'categories.update', 'uses'=>'CategoriesController@update']);
#UPDATE POR PUT - VAI UTLIZAR METHOD SPOOFING
Route::put('categories/{id}/update', ['as'=>'categories.update', 'uses'=>'CategoriesController@update']);

Route::get('products', ['as'=>'products', 'uses'=>'ProductsController@index']);
Route::get('/products/create', ['as'=>'products.create', 'uses'=>'ProductsController@create']);
Route::post('products', ['as'=>'products.store', 'uses'=>'ProductsController@store']);
Route::get('products/{id}/edit', ['as'=>'products.edit', 'uses'=>'ProductsController@edit']);
Route::put('products/{id}/update', ['as'=>'products.update', 'uses'=>'ProductsController@update']);
Route::get('products/{id}/destroy', ['as'=>'products.destroy', 'uses'=>'ProductsController@destroy']);

Route::group(['prefix'=>'admin'], function() {

    Route::get('categories', 'AdminCategoriesController@index');

    Route::post('categories/insert/', function(){
       return "Rota de inserção!!";
    });

    Route::put('categories/update/{id}', function($id){
        if ($id) {
                return "Rota de atualização!!";
        } else {
            return "Sem parametros";
        }
    });

    Route::delete('categories/delete/{id}', function($id){
        if ($id) {
            return "Rota de exclusão!!";
        } else {
            return "Sem parametros";
        }
    });


    Route::get('products', 'AdminProductsController@index');

    Route::post('products/insert/', function(){
        return "Rota de inserção!!";
    });

    Route::put('products/update/{id}', function($id){
        if ($id) {
            return "Rota de atualização!!";
        } else {
            return "Sem parametros";
        }
    });

    Route::delete('products/delete/{id}', function($id){
        if ($id) {
            return "Rota de exclusão!!";
        } else {
            return "Sem parametros";
        }
    });

//    //CATEGORY
//    Route::get('categories/{id?}', function($id = null) {
//        //VERIFICA SE EXISTE PARAMETRO
//        if ($id) {
//            $category = new \CodeCommerce\Category();
//            $c = $category->find($id);
//            //VERIFICA SE HÁ RESULTADOS
//            if(is_object($c))  {
//                return $c->name;
//            } else {
//                return "Sem resultados";
//            }
//        } else {
//            return "Nao ha dados para exibir";
//        }
//    });
//
//    //Produtos
//    Route::get('products/{id?}', function($id = null) {
//        //VERIFICA SE EXISTE PARAMETRO
//        if ($id) {
//            $product = new \CodeCommerce\Product();
//            $p = $product->find($id);
//            //VERIFICA SE HÁ RESULTADOS
//            if(is_object($p))  {
//                return $p->name;
//            } else {
//                return "Sem resultados";
//            }
//        } else {
//            return "Nao ha dados para exibir";
//        }
//    });

});


Route::controllers ([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);
