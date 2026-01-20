<?php

namespace app\Repositories;

use app\DAOs\UserDAO;
use app\Mappers\UserMapper;
use app\Models\User;

class UserRepository
{
    private UserDAO $userDAO;
    private UserMapper $userMapper;

    public function __construct(UserDAO $userDAO, UserMapper $userMapper)
    {
        $this->userDAO = $userDAO;
        $this->userMapper = $userMapper;
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