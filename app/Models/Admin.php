<?php

namespace app\Models;

use app\Models\User;
use \app\Enums\Role;

class Admin extends User
{
    public function __construct(?int $id, string $fullName, string $email, string $password , Role $role = Role::ADMIN)
    {
        parent::__construct($id, $fullName, $email, $password, $role);
    }
}