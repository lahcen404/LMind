<?php

namespace app\Controllers;

use app\Helpers\View;

class AuthController
{
    public function index()
    {
        return View::render('auth.login');
    }
}