<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\User;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class UserController extends Controller
{
    private $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    //
    public function index()
    {
        $usuarios = User::all();
        dd($usuarios);
    }
}
