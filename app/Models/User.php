<?php

namespace app\Models;

use app\Enums\Role;

abstract class User
{
    private ?int $id;
    private string $fullName;
    private string $email;
    private string $password;
    private Role $role;

    public function __construct(?int $id, string $fullName, string $email, string $password, Role $role)
    {
        $this->id = $id;
        $this->fullName = $fullName;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getFullName(): string
    {
        return $this->fullName;
    }
    public function getEmail(): string{
        return $this->email;
    }
    public function getPassword(): string{
        return $this->password;
    }
    public function getRole(): Role{
        return $this->role;
    }

    public function setFullName(string $fullName): void
    {
        $this->fullName = $fullName;
    }

    public function setEmail(string $email): void{
        $this->email = $email;  
    }

    public function setPassword(string $password): void{
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function setRole(Role $role): void{
        $this->role = $role;
    }
}