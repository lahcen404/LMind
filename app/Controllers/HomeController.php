<?php

namespace app\Controllers;

use app\Helpers\View;

class HomeController{
    public function index(){

          if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }
        
        return View::render('home');
    }
}