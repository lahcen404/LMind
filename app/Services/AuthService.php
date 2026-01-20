<?php

namespace app\Services;

use app\Helpers\Session;
use app\Helpers\Validation;
use app\Repositories\UserRepository;

class AuthService
{
    
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function login(string $rEmail, string $rPassword){

        $errors = [] ;

            $email = Validation::clean($rEmail);
            $password = Validation::clean($rPassword);

            if (Validation::isEmpty($email)) {
            $errors['email'] = 'Email is required !!!';
        } elseif (!Validation::isEmail($email)) {
            $errors['email'] = 'Invalid email format !!!';
        }

        if(Validation::isEmpty($password)){
            $errors['password'] = 'Password is required !!';
        }

        if(!$errors){
            $errors;
        }

        $user = $this->userRepository->findUserByEmail($email);

        $isMatch = $user && (password_verify($password, $user->getPassword()) || ($password === $user->getPassword()));

        if (!$isMatch) {
            $errors['login'] = "Email & Password incorrect !!";
            return $errors;
        }

        Session::setSession($user);
        return $user;
    }
    public function logout(){

        if(session_start() === PHP_SESSION_NONE) session_start();
        session_destroy();
        header('Location: /login');
        exit;
    }

}