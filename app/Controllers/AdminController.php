<?php
namespace app\Controllers;

use app\Helpers\View;
use app\Services\ClassService;
use app\Services\UserService;
use config\DBConnection;

class AdminController
{
    public function index()
    {
        
          if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $userService = UserService::getInstance();
        $classService = ClassService::getInstance();

        $users = $userService->getAllUsers();
        $classes = $classService->getALLClasses();
        
        return View::render('admin.dashboard' , ['users' => $users , 'classes'=>$classes] );
    }
}