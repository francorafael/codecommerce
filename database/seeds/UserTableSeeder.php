<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;
use Faker\Factory as Faker;

class UserTableSeeder extends \Illuminate\Database\Seeder
{

    public function run()
    {
        //METODO PARA INSERIR DADOS NO BANCO FICTICIO
        DB::table('users')->truncate();

        factory('CodeCommerce\User', 10)->create();


    }

}