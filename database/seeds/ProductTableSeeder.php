<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;
use Faker\Factory as Faker;

class ProductTableSeeder extends \Illuminate\Database\Seeder
{

    public function run()
    {
        //METODO PARA INSERIR DADOS NO BANCO FICTICIO
        DB::table('products')->truncate();

        factory('CodeCommerce\Product', 10)->create();


    }

}