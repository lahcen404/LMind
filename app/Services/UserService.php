<?php

namespace app\Services;

use app\Enums\Role;
use app\Helpers\Validation;
use app\Models\Admin;
use app\Models\Learner;
use app\Models\Trainer;
use app\Repositories\UserRepository;

class UserService{

    private static ?UserService $instance = null; 

    public static function getInstance(): UserService
    {
        if (self::$instance === null) {
            self::$instance = new UserService();
        }
        return self::$instance;
    }

    public function createUser(array $data){

        $errors=[];

        $userRepository = UserRepository::getInstance();

        $fullName = Validation::clean($data['fullName']);
        $email = Validation::clean($data['email']);
        $password = $data['password'];
        $roleValue = $data['role'] ?? 'LEARNER';

        if (empty($fullname)) $errors['fullname'] = "Full name is required.";
        if (!Validation::isEmail($email)) $errors['email'] = "Valid email is required.";

        if($userRepository->findUserByEmail($email)){
            $errors['email'] = "Email is already registred !!";

        }

        if(!$errors){
            return $errors;
        }

        $hashedPass = password_hash($password,PASSWORD_BCRYPT);

        $role = Role::from($roleValue);

        $user = match($role){
            Role::ADMIN   => new Admin(null, $fullName, $email, $hashedPass, $role),
            Role::TRAINER => new Trainer(null, $fullName, $email, $hashedPass, $role),
            Role::LEARNER => new Learner(null, $fullName, $email, $hashedPass, $role),
        };

        if($userRepository->createUser($user)){
            return $user;
        }

        return $errors['create'] = "Problem in create user !!!";
    }


    public function updateUser(int $id, array $data)
    {

        $errors=[];
        $userRepository = UserRepository::getInstance();

        $user = $userRepository->findUserById($id);
        if (!$user) return ['msg' => "User not found"];

        $user->setFullName(Validation::clean($data['fullname']));
        $user->setEmail(Validation::clean($data['email']));
        $user->setRole(Role::from($data['role']));

        if ($userRepository->updateUser($user)) {
            return true;
        }

        return $errors['update'] = "Problem in create user !!!";
    }

    
    public function deleteUser(int $id): bool
    {
        $userRepository = UserRepository::getInstance();
        return $userRepository->deleteUser($id);
    }

    public function getAllUsers(){
        $userRepository = UserRepository::getInstance();
        return $userRepository->getAllUsers();
    }

    public function getUserById(int $id){
        $userRepository = UserRepository::getInstance();
        return $userRepository->findUserById($id);
    }

    

}