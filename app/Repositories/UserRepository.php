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

    public function findByEmail(string $email): ?User
    {
        $userData = $this->userDAO->getUserByEmail($email);

        if ($userData) {
            return $this->userMapper->toEntity($userData);
        }

        return null;
    }

}