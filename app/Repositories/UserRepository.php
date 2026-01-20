<?php

namespace app\Repositories;

use app\DAOs\UserDAO;
use app\Mappers\UserMapper;
use app\Models\User;

class UserRepository
{
    private UserDAO $userDAO;
    private UserMapper $userMapper;

    public function __construct()
    {
        $this->userDAO = new  UserDAO;
        $this->userMapper = new UserMapper;
    }

    public function findUserByEmail(string $email): ?User
    {
        $userData = $this->userDAO->getUserByEmail($email);

        if ($userData) {
            return $this->userMapper->toEntity($userData);
        }

        return null;
    }

    public function findUserById(int $id){

        $userData = $this->userDAO->getUserById($id);
        if($userData){
            return $this->userMapper::toEntity($userData);
        }

        return null;
    }

   

    public function getAllUsers(): array{

        $rawData = $this->userDAO->getAllUsers();
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

        $data=[
            'fullName' => $user->getFullName(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'role' => $user->getRole()->value,
        ];

        return $this->userDAO->create($data);
    }

    public function updateUser(User $user): bool{
        $data = [
            
            'fullName' => $user->getFullName(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'role' => $user->getRole()->value
        ];

        return $this->userDAO->update($user->getId(),$data);
    }

    public function deleteUser(int $id): bool{

        return $this->userDAO->delete($id);
    }

}