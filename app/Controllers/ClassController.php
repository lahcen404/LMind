<?php

namespace app\Controllers;
use app\Helpers\View;

class ClassController
{
    public function createClass()
    {
        return View::render('admin.classes.create');
    }

    public function assignement()
    {
        return View::render('admin.classes.assignement');
    }

    public function index()
    {
        return View::render('admin.classes.index');
    }
}