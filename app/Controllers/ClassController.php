<?php

namespace app\Controllers;

use app\Helpers\View;
use app\Services\ClassService;
use app\Services\UserService;

class ClassController
{
    private ClassService $classService;
    private UserService $userService;

    public function __construct()
    {
        $this->classService = ClassService::getInstance();
        $this->userService = UserService::getInstance();

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

        $classes = $this->classService->getAllClasses();
        View::render('admin.classes.index', ['classes' => $classes]);
    }

    public function createClass()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $allUsers = $this->userService->getAllUsers();
        $trainers = array_filter($allUsers, function ($user) {
            return $user->getRole()->value === 'TRAINER';
        });

        View::render('admin.classes.create', ['trainers' => $trainers]);
    }

    public function store()
    {
        if ($this->classService->createClass($_POST)) {
            $_SESSION['success'] = "Class created successfully!";
            header('Location: /admin/classes');
        } else {
            $_SESSION['error'] = "Failed to create class.";
            header('Location: /admin/classes/create');
        }
        exit();
    }

    public function edit()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        if (!$id) {
            header('Location: /admin/classes');
            exit();
        }

        $class = $this->classService->getClassById($id);
        if (!$class) {
            $_SESSION['error'] = "Class not found.";
            header('Location: /admin/classes');
            exit();
        }

        $allUsers = $this->userService->getAllUsers();
        $trainers = array_filter($allUsers, function ($user) {
            return $user->getRole()->value === 'TRAINER';
        });

        View::render('admin.classes.edit', [
            'class' => $class,
            'trainers' => $trainers
        ]);
    }

    public function update()
    {
        $id = isset($_POST['id']) ? (int)$_POST['id'] : null;
        if (!$id) {
            header('Location: /admin/classes');
            exit();
        }

        if ($this->classService->updateClass($id, $_POST)) {
            $_SESSION['success'] = "Class updated successfully!";
            header('Location: /admin/classes');
        } else {
            $_SESSION['error'] = "Failed to update class.";
            header('Location: /admin/classes/edit?id=' . $id);
        }
        exit();
    }

    public function delete()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        if ($id && $this->classService->deleteClass($id)) {
            $_SESSION['success'] = "Class deleted successfully!";
        } else {
            $_SESSION['error'] = "Failed to delete class.";
        }
        header('Location: /admin/classes');
        exit();
    }
}