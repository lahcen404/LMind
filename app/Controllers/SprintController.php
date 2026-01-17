<?php

namespace app\Controllers;

use app\Helpers\View;

class SprintController
{
    public function index()
    {
        return View::render('admin.sprints.index');
    }

    public function create()
    {
        return View::render('admin.sprints.create');
    }

    public function view()
    {
        return View::render('admin.sprints.view');
    }
}