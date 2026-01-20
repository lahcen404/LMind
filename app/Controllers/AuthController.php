<?php

namespace app\Controllers;

use app\Helpers\View;
use app\Repositories\UserRepository;

class AuthController
{
    public function index()
    {
        return View::render('auth.login');
    }

    public function login($email,$password){

    }
}