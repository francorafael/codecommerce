<?php
Route::get('/', 'WelcomeController@index');

Route::group(['prefix'=>'admin'], function() {

    //CATEGORY
    Route::get('categories/{id?}', function($id = null) {
        //VERIFICA SE EXISTE PARAMETRO
        if ($id) {
            $category = new \CodeCommerce\Category();
            $c = $category->find($id);
            //VERIFICA SE HÁ RESULTADOS
            if(is_object($c))  {
                return $c->name;
            } else {
                return "Sem resultados";
            }
        } else {
            return "Nao ha dados para exibir";
        }
    });

    //Produtos
    Route::get('products/{id?}', function($id = null) {
        //VERIFICA SE EXISTE PARAMETRO
        if ($id) {
            $product = new \CodeCommerce\Product();
            $p = $product->find($id);
            //VERIFICA SE HÁ RESULTADOS
            if(is_object($p))  {
                return $p->name;
            } else {
                return "Sem resultados";
            }
        } else {
            return "Nao ha dados para exibir";
        }
    });

});


Route::controllers ([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);
