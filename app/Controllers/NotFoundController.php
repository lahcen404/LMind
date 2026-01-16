<?php

namespace app\controllers;

use app\Helpers\View;

class NotFoundController {

    public function index(){

        http_response_code(404);
        return View::render('404');
    }

    
}
