<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{

   public function getLogin()
   {

       $data = [
         'email' => 'rafael.apfsantos@gmail.com',
           'password' => 123456
       ];

       //FAZ O LOGIN
//        if(Auth::attempt($data)) {
//            return"logou";
//        } else {
//            return "falho";
//        }

       //VERIFICA SE ESTA LOGADO
       if(Auth::check()) {
           return Auth::User();
           return"Logado";
       } else {
           return "falho";
       }

   }

    public function getLogout() {
        Auth::logout();

        if(Auth::check()) {
            return"Logado";
        }else {
            return "Não esta logado";
        }
    }
}
