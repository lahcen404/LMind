<?php

namespace app\DAOs;

use app\Models\User;
use config\DBConnection;

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
}