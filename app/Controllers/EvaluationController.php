<?php

namespace app\Controllers;

use app\Helpers\View;

class EvaluationController{

    public function index(){
        return View::render('trainer.evaluations.index');
    }

    public function create(){
        return View::render('trainer.evaluations.form');
    }
}