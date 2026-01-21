<?php

namespace app\DAOs;

use config\DBConnection;
use PDO;

class ClassDAO
{
    private $db;
    private static ?ClassDAO $instance = null;

    
    public static function getInstance(): ClassDAO
    {
        if (self::$instance === null) {
            self::$instance = new ClassDAO();
        }
        return self::$instance;
    }

    
    private function __construct()
    {
        $this->db = DBConnection::getInstance()->connectDB();
    }

    
    public function getAll(): array
    {
        $sql = "SELECT c.*, u.fullname as trainer_name 
                FROM training_Class c 
                LEFT JOIN users u ON c.trainer_id = u.id 
                ORDER BY c.id DESC";
        
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function findById(int $id): ?array
    {
        $sql = "SELECT * FROM training_Class WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $data ?: null;
    }

  
    public function create(array $data): bool
    {
        $sql = "INSERT INTO training_Class (name, promotion, trainer_id) 
                VALUES (:name, :promotion, :trainer_id)";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'name'       => $data['name'],
            'promotion'  => $data['promotion'],
            'trainer_id' => $data['trainer_id'] 
        ]);
    }

    
    public function update(int $id, array $data): bool
    {
        $sql = "UPDATE training_Class 
                SET name = :name, 
                    promotion = :promotion, 
                    trainer_id = :trainer_id 
                WHERE id = :id";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id'         => $id,
            'name'       => $data['name'],
            'promotion'  => $data['promotion'],
            'trainer_id' => $data['trainer_id']
        ]);
    }

    
    public function delete(int $id): bool
    {
        $sql = "DELETE FROM training_Class WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}