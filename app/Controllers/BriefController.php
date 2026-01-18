<?php

namespace app\Controllers;

use app\Helpers\View;

class BriefController{

        public function create(){
            return View::render('trainer.briefs.create');
        }
}