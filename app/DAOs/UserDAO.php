<?php

namespace app\DAOs;

use app\Models\User;
use config\DBConnection;
use PDO;

class UserDAO{

    private $db;

    public function __construct()
    {
        $this->db = DBConnection::getInstance()->connectDB();
    }

    public function getUserByEmail($email): ?array{

        $sql = "SELECT  * from users WHERE email = :email limit 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['email'=> $email]);
        $data = $stmt->fetch();

        return $data ?: null;

    }

    public function create(array $data): bool{

        $sql = 'INSERT INTO users (fullName,email,password,role) VALUES (:fullName, :email, :password, :role)';
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'fullName' => $data['fullName'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => $data['role']
        ]);
    }

      public function update(int $id, array $data): bool {
        $sql = "UPDATE users SET fullname = :fullname, email = :email, role = :role 
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id'       => $id,
            'fullname' => $data['fullName'],
            'email'    => $data['email'],
            'role'     => $data['role']
        ]);
    }

    public function delete(int $id): bool {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    
    public function getAllUsers(): array {
        $sql = "SELECT * FROM users ORDER BY id DESC";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById(int $id): ?array {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }




}