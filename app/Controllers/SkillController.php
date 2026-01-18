<?php

namespace app\Controllers;

use app\Helpers\View;

class SkillController
{
    public function index()
    {
        return View::render('admin.skills.index');
    }
    public function create()
    {
        return View::render('admin.skills.create');
    }
}