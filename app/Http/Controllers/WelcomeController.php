<?php

namespace CodeCommerce\Http\Controllers;




class WelcomeController extends Controller
{

    public function __construct()
    {

    }

    public function index() {
        return view('welcome');
    }

}