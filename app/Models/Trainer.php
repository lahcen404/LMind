<?php

namespace app\Models;

use app\Models\User;
use \app\Enums\Role;

class Trainer extends User
{
    public function __construct(?int $id, string $fullName, string $email, string $password , Role $role = Role::TRAINER)
    {
        parent::__construct($id, $fullName, $email, $password, $role);
    }
}