<?php
Route::get('/', 'WelcomeController@index');

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
