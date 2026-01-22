<?php

namespace app\Controllers;

use app\Helpers\View;
use app\Services\SkillService;

class SkillController
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $skillService = SkillService::getInstance();
        $skills = $skillService->getAllSkills();

        return View::render('admin.skills.index', ['skills' => $skills]);
    }

    public function create()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }
        
        return View::render('admin.skills.create');
    }

    public function store()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $skillService = SkillService::getInstance();

        if ($skillService->addSkill($_POST)) {
            $_SESSION['success'] = "Skill addsded successfully!";
            header('Location: /admin/skills');
        } else {
            $_SESSION['error'] = "Failed to add skill";
            header('Location: /admin/skills/create');
        }
        exit();
    }

    public function edit()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $skillService = SkillService::getInstance();
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        $skill = $skillService->getSkillById($id);

        if (!$skill) {
            header('Location: /admin/skills');
            exit();
        }

        return View::render('admin.skills.edit', ['skill' => $skill]);
    }

    public function update()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $skillService = SkillService::getInstance();
        $id = isset($_POST['id']) ? (int)$_POST['id'] : null;

        if ($skillService->updateSkill($id, $_POST)) {
            $_SESSION['success'] = "Skill updated successsfully!!!";
            header('Location: /admin/skills');
        } else {
            $_SESSION['error'] = "Failed to update skill";
            header('Location: /admin/skills/edit?id=' . $id);
        }
        exit();
    }

    public function delete()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $skillService = SkillService::getInstance();
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;

        if ($skillService->deleteSkill($id)) {
            $_SESSION['success'] = "Skill deleted successfully";
        } else {
            $_SESSION['error'] = "Failed to delete skill";
        }

        header('Location: /admin/skills');
        exit();
    }
}