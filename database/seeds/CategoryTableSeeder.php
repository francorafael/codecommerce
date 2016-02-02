<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;
use Faker\Factory as Faker;

class CategoryTableSeeder extends \Illuminate\Database\Seeder
{

    public function run()
    {
        //METODO PARA INSERIR DADOS NO BANCO FICTICIO
        DB::table('categories')->truncate();

        factory('CodeCommerce\Category', 10)->create();


    }

}