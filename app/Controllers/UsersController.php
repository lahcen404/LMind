<?php

namespace app\Controllers;

use app\Helpers\View;
use app\Models\User;
use app\Services\UserService;

class UsersController{

    public function index(){

        $userService = UserService::getInstance();

          if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $users = $userService->getAllUsers();
        

        return View::render('admin.users.index',['users'=>$users]);
    }

    public function create(){

          if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }
        
        return View::render('admin.users.create');
    }

     public function store()
    {
        $userService = UserService::getInstance();
        $result = $userService->createUser($_POST);

        if ($result instanceof User) {
            $_SESSION['success'] = "User created successfully!";
            header('Location: /admin/users');
            exit();
        } else {
           
            $_SESSION['errors'] = $result;
            $_SESSION['old_data'] = $_POST; 
            header('Location: /admin/users/create');
            exit();
        }
    }

    public function delete()
    {
        $userService = UserService::getInstance();

        $userId = isset($_GET['id']) ? (int)$_GET['id'] : null;

        if ($userId === null) {
            $_SESSION['error'] = "Invalid user ID.";
            header('Location: /admin/users');
            exit();
        }

        $deleted = $userService->deleteUser($userId);

        if ($deleted) {
            $_SESSION['success'] = "User deleted successfully!";
        } else {
            $_SESSION['error'] = "Failed to delete user.";
        }

        header('Location: /admin/users');
        exit();
    }

    
}