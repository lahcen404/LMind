<?php

namespace app\Controllers;

use app\Helpers\View;

class TrainerController{

    public function index(){
        return View::render('trainer.dashboard');
    }
}