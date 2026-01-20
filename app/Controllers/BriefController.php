<?php

namespace app\Controllers;

use app\Helpers\View;

class BriefController{

    public function index(){
          if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }
        
        return View::render('trainer.briefs.index');
    }

    public function linkSkills(){

          if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        return View::render('trainer.briefs.briefSkill');
    }

        public function create(){

              if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

            return View::render('trainer.briefs.create');
        }

        public function details(){

              if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }
        
            return View::render('trainer.briefs.details');
        }
}