<?php

namespace app\Repositories;

use app\DAOs\UserDAO;
use app\Mappers\UserMapper;
use app\Models\User;

class UserRepository
{

    private static ?UserRepository $instance = null; 

    public static function getInstance(): UserRepository
    {
        if (self::$instance === null) {
            self::$instance = new UserRepository();
        }
        return self::$instance;
    }
   
    

    public function findUserByEmail(string $email): ?User
    {

        $userDAO = UserDAO::getInstance();
        $userMapper = UserMapper::getInstance();


        $userData = $userDAO->getUserByEmail($email);

        if ($userData) {
            return $userMapper->toEntity($userData);
        }

        return null;
    }

    public function findUserById(int $id){

        $userMapper = UserMapper::getInstance();
        $userDAO = UserDAO::getInstance();

        $userData = $userDAO->getUserById($id);
        if($userData){
            return $userMapper::toEntity($userData);
        }

        return null;
    }

   

    public function getAllUsers(): array{

        $userDAO = UserDAO::getInstance();

        $rawData = $userDAO->getAllUsers();
        $users = [];
        foreach($rawData as $data){
            $user = UserMapper::toEntity($data);
            if($user){
                $users [] = $user;
            }
        }

        return $users;
    }


    public function createUser(User $user): bool{

        $userDAO = UserDAO::getInstance();

        $data=[
            'fullName' => $user->getFullName(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'role' => $user->getRole()->value,
        ];

        return $userDAO->create($data);
    }

    public function updateUser(User $user): bool{

        $userDAO = UserDAO::getInstance();

        $data = [
            
            'fullName' => $user->getFullName(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'role' => $user->getRole()->value
        ];

        return $userDAO->update($user->getId(),$data);
    }

    public function deleteUser(int $id): bool{

        $userDAO = UserDAO::getInstance();
        return $userDAO->delete($id);
    }

}