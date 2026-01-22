<?php

namespace app\Controllers;

use app\Helpers\View;
use app\Services\ClassService;
use app\Services\UserService;

class ClassController
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // list classes
    public function index()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $classService = ClassService::getInstance();
        $classes = $classService->getAllClasses();
        View::render('admin.classes.index', ['classes' => $classes]);
    }

    // select class
    public function assignement()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $classService = ClassService::getInstance();
        $classes = $classService->getAllClasses();
        return View::render('admin.classes.assignement', ['classes' => $classes]);
    }

    // assign Studeents
    public function assignStudents()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $classService = ClassService::getInstance();
        $userService = UserService::getInstance();

        $classId = isset($_GET['id']) ? (int)$_GET['id'] : null;

        if (!$classId) {
            $_SESSION['error'] = "Please select a valid class.";
            header('Location: /admin/classes/assignement');
            exit();
        }

        $class = $classService->getClassById($classId);
        if (!$class) {
            $_SESSION['error'] = "Class not found.";
            header('Location: /admin/classes/assignement');
            exit();
        }

        $unassignedPool = $userService->getUnassignedLearners();
        $roster = $userService->getLearnersByClass($classId);

        View::render('admin.classes.assignLearners', [
            'class' => $class,
            'unassignedPool' => $unassignedPool,
            'roster' => $roster
        ]);
    }

    // assign student
    public function assign()
    {
        $userService = UserService::getInstance();

        $userId = isset($_GET['user_id']) ? (int)$_GET['user_id'] : null;
        $classId = isset($_GET['class_id']) ? (int)$_GET['class_id'] : null;

        if ($userId && $classId) {
            if ($userService->assignToClass($userId, $classId)) {
                $_SESSION['success'] = "Learner assigned successfully!";
            } else {
                $_SESSION['error'] = "Failed to assign learner.";
            }
        }

        header("Location: /admin/classes/enroll?id=$classId");
        exit();
    }

    // remove student
    public function unassign()
    {
        $userService = UserService::getInstance();

        $userId = isset($_GET['user_id']) ? (int)$_GET['user_id'] : null;
        $classId = isset($_GET['class_id']) ? (int)$_GET['class_id'] : null;

        if ($userId) {
            if ($userService->removeFromClass($userId)) {
                $_SESSION['success'] = "Learner removed from roster.";
            } else {
                $_SESSION['error'] = "Failed to remove learner.";
            }
        }

        header("Location: /admin/classes/enroll?id=$classId");
        exit();
    }

    // create form
    public function createClass()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $userService = UserService::getInstance();

        $allUsers = $userService->getAllUsers();
        $trainers = array_filter($allUsers, function ($user) {
            return $user->getRole()->value === 'TRAINER';
        });

        View::render('admin.classes.create', ['trainers' => $trainers]);
    }

    // store class
    public function store()
    {
        $classService = ClassService::getInstance();

        if ($classService->createClass($_POST)) {
            $_SESSION['success'] = "Class created successfully!";
            header('Location: /admin/classes');
        } else {
            $_SESSION['error'] = "Failed to create class.";
            header('Location: /admin/classes/create');
        }
        exit();
    }

    // ediit form
    public function edit()
    {
        $classService = ClassService::getInstance();
        $userService = UserService::getInstance();

        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        if (!$id) {
            header('Location: /admin/classes');
            exit();
        }

        $class = $classService->getClassById($id);
        if (!$class) {
            $_SESSION['error'] = "Class not found.";
            header('Location: /admin/classes');
            exit();
        }

        $allUsers = $userService->getAllUsers();
        $trainers = array_filter($allUsers, function ($user) {
            return $user->getRole()->value === 'TRAINER';
        });

        View::render('admin.classes.edit', [
            'class' => $class,
            'trainers' => $trainers
        ]);
    }

    // update class
    public function update()
    {
        $classService = ClassService::getInstance();

        $id = isset($_POST['id']) ? (int)$_POST['id'] : null;
        if (!$id) {
            header('Location: /admin/classes');
            exit();
        }

        if ($classService->updateClass($id, $_POST)) {
            $_SESSION['success'] = "Class updated successfully!";
            header('Location: /admin/classes');
        } else {
            $_SESSION['error'] = "Failed to update class.";
            header('Location: /admin/classes/edit?id=' . $id);
        }
        exit();
    }

    // delete class
    public function delete()
    {
        $classService = ClassService::getInstance();
        
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        if ($id && $classService->deleteClass($id)) {
            $_SESSION['success'] = "Class deleted successfully!";
        } else {
            $_SESSION['error'] = "Failed to delete class.";
        }
        header('Location: /admin/classes');
        exit();
    }
}