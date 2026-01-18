<?php

namespace app\Controllers;

use app\Helpers\View;

class BriefController{

    public function index(){
        return View::render('trainer.briefs.index');
    }

        public function create(){
            return View::render('trainer.briefs.create');
        }

        public function details(){
            return View::render('trainer.briefs.details');
        }
}