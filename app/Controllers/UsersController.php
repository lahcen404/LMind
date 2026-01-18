<?php

namespace app\Controllers;

use app\Helpers\View;

class UsersController{

    public function index(){
        return View::render('admin.users.index');
    }
}