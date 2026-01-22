<?php

namespace app\DAOs;

use config\DBConnection;

class SprintDAO
{
    private static ?SprintDAO $instance = null;


    public static function getInstance(): SprintDAO
    {
        if (self::$instance === null) {
            self::$instance = new SprintDAO();
        }
        return self::$instance;
    }

    private function __construct() {}

    // get all spriints
    public function getAll(): array
    {
        $db = DBConnection::getInstance()->connectDB();
        $sql = "SELECT s.*, c.name as class_name 
                FROM sprints s 
                JOIN training_Class c ON s.class_Id = c.id 
                ORDER BY s.class_Id, s.order_Sprint ASC";
        return $db->query($sql)->fetchAll();
    }

    // find by id
    public function findById(int $id): ?array
    {
        $db = DBConnection::getInstance()->connectDB();
        $sql = "SELECT s.*, c.name as class_name 
                FROM sprints s 
                JOIN training_Class c ON s.class_Id = c.id 
                WHERE s.id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch() ?: null;
    }

    // create spriint
    public function create(array $data): bool
    {
        $db = DBConnection::getInstance()->connectDB();
        $sql = "INSERT INTO sprints (name, duration, order_Sprint, class_Id) 
                VALUES (:name, :duration, :order_sprint, :class_id)";
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            'name'         => $data['name'],
            'duration'     => $data['duration'],
            'order_sprint' => $data['order_sprint'],
            'class_id'     => $data['class_id']
        ]);
    }

    // update sprint
    public function update(int $id, array $data): bool
    {
        $db = DBConnection::getInstance()->connectDB();
        $sql = "UPDATE sprints SET 
                name = :name, 
                duration = :duration, 
                order_Sprint = :order_sprint, 
                class_Id = :class_id 
                WHERE id = :id";
        
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            'id'           => $id,
            'name'         => $data['name'],
            'duration'     => $data['duration'],
            'order_sprint' => $data['order_sprint'],
            'class_id'     => $data['class_id']
        ]);
    }

    // delete spriint
    public function delete(int $id): bool
    {
        $db = DBConnection::getInstance()->connectDB();
        $sql = "DELETE FROM sprints WHERE id = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}