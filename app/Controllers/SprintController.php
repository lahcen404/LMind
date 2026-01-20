<?php

namespace app\Controllers;

use app\Helpers\View;

class SprintController
{
    public function index()
    {
          if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        return View::render('admin.sprints.index');
    }

    public function create()
    {
          if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        return View::render('admin.sprints.create');
    }

    public function view()
    {
          if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }
        
        return View::render('admin.sprints.view');
    }
}