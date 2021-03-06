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

        $faker = Faker::create();

        User::create([
            'name' => 'Rafael Franco',
            'email' => 'rafael@rafael.com',
            'password' => \Illuminate\Support\Facades\Hash::make(123456),
            'address' => 'Rua tal',
            'number' => '123',
            'neighborhood' => 'Casa',
            'city' => 'São Paulo',
            'zip' => '19050-260',
            'state' => 'SP',
            'is_admin' => 1
        ]);
//
//        User::create([
//            'name' => 'AnaPaula',
//            'email' => 'ana@ana.com',
//            'password' => \Illuminate\Support\Facades\Hash::make(123456),
//            'is_admin' => 0
//        ]);

//        User::create([
//            'name' => 'Bruno Prado',
//            'email' => 'bruno@bruno.com',
//            'password' => \Illuminate\Support\Facades\Hash::make(123456)
//        ]);
        //factory('CodeCommerce\User', 10)->create();
    }

}