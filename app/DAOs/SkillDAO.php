<?php

namespace app\DAOs;

use config\DBConnection;
use PDO;

class SkillDAO
{
    private static ?SkillDAO $instance = null;

    public static function getInstance(): SkillDAO
    {
        if (self::$instance === null) {
            self::$instance = new SkillDAO();
        }
        return self::$instance;
    }

    private function __construct() {}

    // get all skills
    public function getAll(): array
    {
        $db = DBConnection::getInstance()->connectDB();
        $sql = "SELECT * FROM skills ORDER BY category, code ASC";
        return $db->query($sql)->fetchAll();
    }

    // find skiill by id
    public function findById(int $id): ?array
    {
        $db = DBConnection::getInstance()->connectDB();
        $sql = "SELECT * FROM skills WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch() ?: null;
    }

    // create skill
    public function create(array $data): bool
    {
        $db = DBConnection::getInstance()->connectDB();
        $sql = "INSERT INTO skills (code, description, category) 
                VALUES (:code, :description, :category)";
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            'code'        => $data['code'],
            'description' => $data['description'],
            'category'    => $data['category']
        ]);
    }

    // update skill
    public function update(int $id, array $data): bool
    {
        $db = DBConnection::getInstance()->connectDB();
        $sql = "UPDATE skills SET 
                code = :code, 
                description = :description, 
                category = :category 
                WHERE id = :id";
        
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            'id'          => $id,
            'code'        => $data['code'],
            'description' => $data['description'],
            'category'    => $data['category']
        ]);
    }

    // delete skiill
    public function delete(int $id): bool
    {
        $db = DBConnection::getInstance()->connectDB();
        $sql = "DELETE FROM skills WHERE id = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}