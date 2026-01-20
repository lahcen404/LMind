<?php

namespace app\Controllers;
use app\Helpers\View;

class ClassController
{
    public function createClass()
    {
          if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        return View::render('admin.classes.create');
    }

    public function assignement()
    {
          if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        return View::render('admin.classes.assignement');
    }

    public function index()
    {
          if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        return View::render('admin.classes.index');
    }

    public function assignLearner()
    {
          if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }
        
        return View::render('admin.classes.assignLearners');
    }
}