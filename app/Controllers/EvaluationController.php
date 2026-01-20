<?php

namespace app\Controllers;

use app\Helpers\View;

class EvaluationController{

    public function index(){

          if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        return View::render('trainer.evaluations.index');
    }

    public function create(){

          if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }
        
        return View::render('trainer.evaluations.form');
    }
}