<?php

namespace app\Controllers;

use app\Helpers\View;

class UsersController{

    public function index(){

          if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        return View::render('admin.users.index');
    }

    public function create(){

          if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }
        
        return View::render('admin.users.create');
    }
}