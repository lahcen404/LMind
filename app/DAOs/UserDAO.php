<?php

namespace app\DAOs;

use app\Models\User;
use config\DBConnection;
use PDO;

class UserDAO{

    private $db;
    private static ?UserDAO $instance = null; 

    public static function getInstance(): UserDAO
    {
        if (self::$instance === null) {
            self::$instance = new UserDAO();
        }
        return self::$instance;
    }

    private function __construct()
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
        $sql = "UPDATE users SET fullname = :fullName, email = :email, role = :role 
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id'       => $id,
            'fullName' => $data['fullName'],
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


     public function getUnassignedLearners(): array
    {
        $sql = "SELECT * FROM users WHERE role = 'LEARNER' AND class_id IS NULL ORDER BY fullName ASC";
        return $this->db->query($sql)->fetchAll();
    }

     public function getLearnersByClass(int $classId): array
    {
        $sql = "SELECT * FROM users WHERE role = 'LEARNER' AND class_id = :classId ORDER BY fullName ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['classId' => $classId]);
        return $stmt->fetchAll();
    }

    public function getCountLearners(){
        $sql = "SELECT * FROM users WHERE role ='LEARNER'";
        return $this->db->query($sql)->fetchAll();
    }

     public function getCountTrianers(){
        $sql = "SELECT * FROM users WHERE role ='TRAINER'";
        return $this->db->query($sql)->fetchAll();
    }

    
    public function updateClassId(int $userId, ?int $classId): bool
    {
        $sql = "UPDATE users SET class_id = :classId WHERE id = :userId";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'classId' => $classId,
            'userId'  => $userId
        ]);
    }

}