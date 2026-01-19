<?php

namespace app\Controllers;

use app\Helpers\View;

class HomeController{
    public function index(){
        return View::render('home');
    }
}