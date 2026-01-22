<?php

namespace app\Controllers;

use app\Helpers\View;
use app\Services\SprintService;
use app\Services\ClassService;

class SprintController
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // list sprints
    public function index()
    {
        if (!isset($_SESSION['user_id'])) { header('Location: /login'); exit(); }

        $sprintService = SprintService::getInstance();
        $sprints = $sprintService->getAllSprints();

        View::render('admin.sprints.index', ['sprints' => $sprints]);
    }

    // create form
    public function create()
    {
        if (!isset($_SESSION['user_id'])) { header('Location: /login'); exit(); }

        $classService = ClassService::getInstance();
        $classes = $classService->getAllClasses();

        View::render('admin.sprints.create', ['classes' => $classes]);
    }

    // store sprint
    public function store()
    {
        $sprintService = SprintService::getInstance();

        if ($sprintService->addSprint($_POST)) {
            $_SESSION['success'] = "sprint created successfully";
            header('Location: /admin/sprints');
        } else {
            $_SESSION['error'] = "failed to create sprint";
            header('Location: /admin/sprints/create');
        }
        exit();
    }

    // edit form
    public function edit()
    {
        if (!isset($_SESSION['user_id'])) { header('Location: /login'); exit(); }

        $sprintService = SprintService::getInstance();
        $classService = ClassService::getInstance();

        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        $sprint = $sprintService->getSprintById($id);
        $classes = $classService->getAllClasses();

        if (!$sprint) {
            $_SESSION['error'] = "sprint not found";
            header('Location: /admin/sprints');
            exit();
        }

        View::render('admin.sprints.edit', [
            'sprint' => $sprint,
            'classes' => $classes
        ]);
    }

    // update sprint
    public function update()
    {
        $sprintService = SprintService::getInstance();

        $id = isset($_POST['id']) ? (int)$_POST['id'] : null;

        if ($sprintService->updateSprint($id, $_POST)) {
            $_SESSION['success'] = "sprint updated successfully";
            header('Location: /admin/sprints');
        } else {
            $_SESSION['error'] = "failed to update sprint";
            header('Location: /admin/sprints/edit?id=' . $id);
        }
        exit();
    }

    // delete sprint
    public function delete()
    {
        $sprintService = SprintService::getInstance();

        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        if ($id && $sprintService->deleteSprint($id)) {
            $_SESSION['success'] = "sprint deleted successfully";
        } else {
            $_SESSION['error'] = "failed to delete sprint";
        }

        header('Location: /admin/sprints');
        exit();
    }

    // sprint details
    public function view()
    {
        if (!isset($_SESSION['user_id'])) { header('Location: /login'); exit(); }

        $sprintService = SprintService::getInstance();
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        $sprint = $sprintService->getSprintById($id);

        if (!$sprint) {
            header('Location: /admin/sprints');
            exit();
        }

        View::render('admin.sprints.view', ['sprint' => $sprint]);
    }
}