<?php

namespace app\Mappers;

use app\Enums\Role;
use app\Models\Admin;
use app\Models\Learner;
use app\Models\Trainer;
use app\Models\User;

class UserMapper{

    private static ?UserMapper $instance = null; 

    public static function getInstance(): UserMapper
    {
        if (self::$instance === null) {
            self::$instance = new UserMapper();
        }
        return self::$instance;
    }

    public static function toEntity(array $data): ?User{

        if(empty($data)){
            return null;
        }

        try{
            $roleValue = strtoupper($data['role']);
            $role = Role::from($roleValue);
        }catch(\ValueError){
            return null;
        }

        $id = $data['id'] ?? null;
        $fullName = $data['fullName'] ?? $data['fullname'] ?? '';
        $email = $data['email'] ?? '';
        $password = $data['password'] ?? '';

        return match($role){
            Role::ADMIN => new Admin($id,$fullName,$email,$password,$role),
            Role::TRAINER => new Trainer($id,$fullName,$email,$password,$role),
            Role::LEARNER => new Learner($id,$fullName,$email,$password,$role),
        };

    }
}