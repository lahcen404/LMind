<?php

namespace app\DAOs;

use config\DBConnection;

class EvaluationDAO
{
    private static ?EvaluationDAO $instance = null;

   
    public static function getInstance(): EvaluationDAO
    {
        if (self::$instance === null) {
            self::$instance = new EvaluationDAO();
        }
        return self::$instance;
    }

    private function __construct() {}

    // get all with full context
    public function getAllWithDetails(): array
    {
        $db = DBConnection::getInstance()->connectDB();
        $sql = "SELECT e.*, 
                       u.fullname as learner_name, 
                       b.title as brief_title, 
                       s.code as skill_code
                FROM evaluations e
                JOIN users u ON e.learner_id = u.id
                JOIN briefs b ON e.brief_id = b.id
                JOIN skills s ON e.skill_id = s.id
                ORDER BY e.created_at DESC";
        
        return $db->query($sql)->fetchAll();
    }

    // find by id
    public function findById(int $id): ?array
    {
        $db = DBConnection::getInstance()->connectDB();
        $sql = "SELECT e.*, u.fullname as learner_name, b.title as brief_title, s.code as skill_code
                FROM evaluations e
                JOIN users u ON e.learner_id = u.id
                JOIN briefs b ON e.brief_id = b.id
                JOIN skills s ON e.skill_id = s.id
                WHERE e.id = :id";
        
        $stmt = $db->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result ?: null;
    }

    // get by learner id
    public function getByLearner(int $learnerId): array
    {
        $db = DBConnection::getInstance()->connectDB();
        $sql = "SELECT e.*, b.title as brief_title, s.code as skill_code
                FROM evaluations e
                JOIN briefs b ON e.brief_id = b.id
                JOIN skills s ON e.skill_id = s.id
                WHERE e.learner_id = :learnerId
                ORDER BY s.code ASC";
        
        $stmt = $db->prepare($sql);
        $stmt->execute(['learnerId' => $learnerId]);
        return $stmt->fetchAll();
    }

    // creeate evaluation
    public function create(array $data): bool
    {
        $db = DBConnection::getInstance()->connectDB();
        $sql = "INSERT INTO evaluations (learner_id, brief_id, skill_id, level, comment) 
                VALUES (:learner_id, :brief_id, :skill_id, :level, :comment)";
        
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            'learner_id' => $data['learner_id'],
            'brief_id'   => $data['brief_id'],
            'skill_id'   => $data['skill_id'],
            'level'      => $data['level'],
            'comment'    => $data['comment'] ?? null
        ]);
    }

    // update evaluation
    public function update(int $id, array $data): bool
    {
        $db = DBConnection::getInstance()->connectDB();
        $sql = "UPDATE evaluations 
                SET level = :level, 
                    comment = :comment 
                WHERE id = :id";
        
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            'id'      => $id,
            'level'   => $data['level'],
            'comment' => $data['comment'] ?? null
        ]);
    }

    // delete evaluation
    public function delete(int $id): bool
    {
        $db = DBConnection::getInstance()->connectDB();
        $sql = "DELETE FROM evaluations WHERE id = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}