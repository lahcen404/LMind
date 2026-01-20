<?php

namespace app\Controllers;

use app\Enums\Role;
use app\Helpers\View;
use app\Models\User;
use app\Repositories\UserRepository;
use app\Services\AuthService;

class AuthController
{

    private AuthService $authService ;

    public function __construct( )
    {
        $this->authService = new AuthService();

         if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }


    }

    public function index()
    {
        return View::render('auth.login');
    }

    public function login(){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $result = $this->authService->login($email,$password);

        if($result instanceof User){
            $path = match($result->getRole()){
                Role::ADMIN   => '/admin/dashboard',
                Role::TRAINER => '/trainer/dashboard',
                Role::LEARNER => '/learner/dashboard',
                default       => '/login',
            };  

            header("Location: $path");
            exit();
        } else {
            
            $_SESSION['errors'] = $result; 

            header('Location: /login');
            exit();
        }
        
    }

    public function logout(){

        $this->authService->logout();
        header("Location: /login");
        exit();
    }
}